<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/data_tabular/') ?>" class="btn btn-<?= empty($jenis)?'success':'primary' ?>">Semua Data</a>
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/data_tabular/pencurian-motor') ?>" class="btn btn-<?= $jenis == 'pencurian-motor'?'success':'primary' ?>">Pencurian Motor</a>
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/data_tabular/pencurian-ringan') ?>" class="btn btn-<?= $jenis == 'pencurian-ringan'?'success':'primary' ?>">Pencurian Ringan</a>
		<p>
			<br>
			<!-- <a class="btn btn-info">Pilih Centroid</a> -->
		</p>
	</div>
	<div class="box">
		<div class="box-body">
			<table class="table table-hover table-striped datatable">
				<thead>
					<th>No</th>
					<th>Jenis</th>
					<th>Desa</th>
					<th>Dusun</th>
					<th>Jalan</th>
					<th>TKP</th>
					<th>Nominal Kerugian</th>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value) : ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= ($value->jenis == 'pencurian-motor')?1:2 ?></td>
						<td><?= $value->desa ?></td>
						<td><?= $value->dusun ?></td>
						<td><?= $value->jalan ?></td>
						<td><?= $value->tkp ?></td>
						<td><?= $value->kerugian_nominal ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">

		</div>
	</div>
</section>
