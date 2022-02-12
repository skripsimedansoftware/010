<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Data<small>Laporan Kriminal</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
			<table class="table table-hover table-striped datatable">
				<thead>
					<th>No</th>
					<th>Nomor Surat</th>
					<th>Tanggal</th>
					<th>Jenis</th>
					<th>Desa</th>
					<th>Dusun</th>
					<th>Jalan</th>
					<th>TKP</th>
					<th>Kerugian Nominal</th>
					<th>Modus</th>
					<th>Deskripsi</th>
					<th>Opsi</th>
				</thead>
				<tbody>
					<?php foreach ($data->result_array() as $key => $value):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= $value['nama'] ?></td>
							<td>
								<a href="<?= base_url($this->router->fetch_class().'/desa/edit/'.$value['id']) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url($this->router->fetch_class().'/desa/delete/'.$value['id']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<a href="<?= base_url($this->router->fetch_class().'/desa/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Desa</a>
		</div>
	</div>
</section>
