<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Data<small>Dusun</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
			<table class="table table-hover table-striped datatable">
				<thead>
					<th>No</th>
					<th>Nama Desa</th>
					<th>Nama Dusun</th>
					<th>Opsi</th>
				</thead>
				<tbody>
					<?php foreach ($data->result_array() as $key => $value):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td>
							<?php
							$desa = $this->desa->read(array('id' => $value['desa']));
							if ($desa->num_rows() >= 1)
							{
								$desa = $desa->row();
								echo $desa->nama;
							}
							?>
							</td>
							<td><?= $value['nama'] ?></td>
							<td>
								<a href="<?= base_url($this->router->fetch_class().'/dusun/edit/'.$value['id']) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url($this->router->fetch_class().'/dusun/delete/'.$value['id']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<a href="<?= base_url($this->router->fetch_class().'/dusun/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Dusun</a>
		</div>
	</div>
</section>
