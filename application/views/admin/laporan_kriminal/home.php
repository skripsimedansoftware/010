<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Data<small>Laporan Kriminal</small></h1>
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
	<?php if ($this->session->has_userdata('update')) : ?>
	<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Info!</strong> <?= $this->session->flashdata('update'); ?>
	</div>
	<?php endif; ?>
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
					<th>Opsi</th>
				</thead>
				<tbody>
					<?php foreach ($data->result_array() as $key => $value):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= $value['nomor_surat'] ?></td>
							<td><?= nice_date($value['tanggal'], 'd-m-Y') ?></td>
							<td><?= $value['jenis'] == 'pencurian-motor'?'Pencurian Sepeda Motor':'Pencurian Ringan' ?></td>
							<td><?= $this->desa->read(array('id' => $value['desa']))->row()->nama ?></td>
							<td><?= $value['kerugian_nominal'] ?></td>
							<td>
								<a href="<?= base_url($this->router->fetch_class().'/laporan_kriminal/edit/'.$value['id']) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url($this->router->fetch_class().'/laporan_kriminal/delete/'.$value['id']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<a href="<?= base_url($this->router->fetch_class().'/laporan_kriminal/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Laporan</a>
		</div>
	</div>
</section>
