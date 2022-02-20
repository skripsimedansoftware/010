<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Data<small>TKP</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<form method="post" action="<?= base_url($this->router->fetch_class().'/tkp/edit/'.$data['id']) ?>">
		<div class="box">
			<div class="box-body">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= set_value('nama', $data['nama']) ?>">
					</div>
				</div>
			</div>
			<div class="box-footer">
				<a href="<?= base_url($this->router->fetch_class().'/tkp') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</a>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
	</form>
</section>
