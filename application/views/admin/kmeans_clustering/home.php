<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/execute/') ?>" class="btn btn-<?= empty($jenis)?'success':'primary' ?>">Semua Data</a>
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/execute/pencurian-motor') ?>" class="btn btn-<?= $jenis == 'pencurian-motor'?'success':'primary' ?>">Pencurian Motor</a>
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/execute/pencurian-ringan') ?>" class="btn btn-<?= $jenis == 'pencurian-ringan'?'success':'primary' ?>">Pencurian Ringan</a>
		<p>
			<br>
			<!-- <a class="btn btn-info">Pilih Centroid</a> -->
		</p>
	</div>
	<div class="box">
		<div class="box-body">
			<table class="datatable">
				<thead>
					<th>No</th>
					<th>Nomor Surat</th>
					<th>Tanggal</th>
					<th>Jenis</th>
					<th>Desa</th>
					<th>Kerugian Nominal</th>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= $value->nomor_surat ?></td>
							<td><?= nice_date($value->tanggal, 'd-m-Y') ?></td>
							<td><?= $value->jenis == 'pencurian-motor'?'Pencurian Sepeda Motor':'Pencurian Ringan' ?></td>
							<td><?= $this->desa->read(array('id' => $value->desa))->row()->nama ?></td>
							<td><?= $value->kerugian_nominal ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<div class="col-lg-12">
			<h3>Centroid Awal</h3>
		</div>
		<?php
		$result = array();
		$initial_centroid = $kmeans->getInitialCentroid();
		$col_width_centroid = (12/count($initial_centroid));
		foreach ($initial_centroid as $centroid)
		{
			?>
			<div class="col-lg-<?= $col_width_centroid;?> col-md-<?= $col_width_centroid;?> col-xs-<?= $col_width_centroid;?>">
				<table class="table table-hover table-striped table-bordered">
					<?php
					foreach ($centroid as $key => $val)
					{
						?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $val ?></td>
						</tr>
						<?php
					}
					?>
				</table>
			</div>
			<?php
		}

		if (!empty($data))
		{
			$i = 1;
			for (; ; ) {
				$kmeans->setIteration($i);
				$kmeans->run();
				if ($kmeans->isDone())
				{
					$result = $kmeans->getAllResults();
					break;
				}

				$i++;
			}

			$count_centroid = count($result['centroids']);
			$col_width_centroid = (12/$count_centroid);

			?>
			<div class="col-lg-12">
				<h3>Centroid Pusat</h3>
			</div>
			<?php

			foreach ($result['centroids'] as $centroid)
			{
				?>
				<div class="col-lg-<?= $col_width_centroid;?> col-md-<?= $col_width_centroid;?> col-xs-<?= $col_width_centroid;?>">
					<table class="table table-hover table-striped table-bordered">
						<?php
						foreach ($centroid as $key => $val)
						{
							?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $val ?></td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
				<?php
			}

			for ($iteration = 0; $iteration < $result['iteration']; $iteration++)
			{
				?>
				<div class="row">
				<div class="col-lg-12">
					<h3>Itersasi <?= ($iteration+1) ?></h3>
				</div>
				<?php
				foreach ($result['clusters']['iteration_'.($iteration+1)] as $cluster)
				{
					?>
					<div class="col-lg-<?= $col_width_centroid;?>">
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<th>Jenis</th>
								<th>Desa</th>
								<th>Dusun</th>
								<th>Jalan</th>
								<th>TKP</th>
								<th>Nominal Kerugian</th>
							</thead>
							<tbody>
								<?php
								foreach ($cluster as $item)
								{
									?>
									<tr>
										<td><?= $item['Jenis'] ?></td>
										<td><?= $item['Desa'] ?></td>
										<td><?= $item['Dusun'] ?></td>
										<td><?= $item['Jalan'] ?></td>
										<td><?= $item['TKP'] ?></td>
										<td><?= $item['Nominal Kerugian'] ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
					<?php
				}
				?>
				</div>
				<?php
			}
		}
		else
		{
			echo '<center><h3>Data Tidak Tersedia</h3></center>';
		}
		?>
		</div>
	</div>
</section>