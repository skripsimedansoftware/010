<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<h1>Clusters</h1>
		<?php
		$result = array();
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

			foreach ($result['centroids'] as $centroid)
			{
				?>
				<div class="col-lg-<?= $col_width_centroid;?>">
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
					<h1>Itersasi <?= ($iteration+1) ?></h1>
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
		<div class="box-footer">
		</div>
	</div>
</section>
