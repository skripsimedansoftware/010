<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Data<small>Jalan</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
			<table class="table table-hover table-striped datatable">
				<thead>
					<th>No</th>
					<th>Nama Dusun</th>
					<th>Nama Jalan</th>
					<th>Opsi</th>
				</thead>
				<tbody>
					<?php foreach ($data->result_array() as $key => $value):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td>
							<?php
							$dusun = $this->dusun->read(array('id' => $value['dusun']));
							if ($dusun->num_rows() >= 1)
							{
								$dusun = $dusun->row();
								echo $dusun->nama;
							}
							?>
							</td>
							<td><?= $value['nama'] ?></td>
							<td>
								<a href="<?= base_url($this->router->fetch_class().'/jalan/edit/'.$value['id']) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url($this->router->fetch_class().'/jalan/delete/'.$value['id']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<a href="<?= base_url($this->router->fetch_class().'/jalan/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jalan</a>
		</div>
	</div>
</section>
