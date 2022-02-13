<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Edit Data<small>Desa</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<form method="post" action="<?= base_url($this->router->fetch_class().'/desa/edit/'.$data['id']) ?>">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $data['nama'] ?>">
				</div>
			</div>
			<div class="box-footer">
				<a href="<?= base_url($this->router->fetch_class().'/desa') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</a>
				<button class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
			</div>
		</div>
	</form>
</section>
