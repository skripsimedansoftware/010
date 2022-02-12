<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Edit Data<small>Desa</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
			<form method="post" action="<?= base_url($this->router->fetch_class().'/desa/edit/'.$data['id']) ?>">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="Nama">
				</div>
			</form>
		</div>
		<div class="box-footer">
			<a href="<?= base_url('desa/') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Desa</a>
		</div>
	</div>
</section>
