<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Sunting Data<small>Laporan Kriminal</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<form method="post" action="<?= base_url($this->router->fetch_class().'/laporan_kriminal/edit/'.$data['id']) ?>">
		<div class="box">
			<div class="box-body">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Nomor Surat</label>
						<input type="text" class="form-control" name="nomor_surat" placeholder="Nomor Surat" value="<?= $data['nomor_surat'] ?>">
						<?= form_error('nomor_surat', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Tanggal</label>
						<input type="text" class="form-control datemask" name="tanggal" placeholder="Tanggal" value="<?= nice_date($data['tanggal'], 'd/m/Y') ?>">
						<?= form_error('tanggal', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Jenis Laporan</label>
						<select name="jenis" class="form-control">
							<option value="">Pilih Jenis Laporan</option>
							<option <?= $data['jenis'] == 'pencurian-motor'?'selected':'' ?> value="pencurian-motor">Pencurian Motor</option>
							<option <?= $data['jenis'] == 'pencurian-ringan'?'selected':'' ?> value="pencurian-ringan">Pencurian Ringan</option>
						</select>
						<?= form_error('jenis', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Desa</label>
						<select class="form-control" name="desa">
							<option value="">Pilih Nama Desa</option>
							<?php foreach ($this->desa->read()->result_array() as $desa): ?>
								<option <?= set_value('desa', $data['desa']) == $desa['id']?'selected':'' ?> value="<?= $desa['id'] ?>"><?= $desa['nama'] ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('desa', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Dusun</label>
						<select class="form-control" name="dusun">
							<option value="">Pilih Nama Dusun</option>
							<?php foreach ($this->dusun->read()->result_array() as $dusun): ?>
								<option <?= set_value('dusun', $data['dusun']) == $dusun['id']?'selected':'' ?> value="<?= $dusun['id'] ?>"><?= $dusun['nama'] ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('dusun', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Jalan</label>
						<select class="form-control" name="jalan">
							<option value="">Pilih Nama Jalan</option>
							<?php foreach ($this->jalan->read()->result_array() as $jalan): ?>
								<option <?= set_value('jalan', $data['jalan']) == $jalan['id']?'selected':'' ?> value="<?= $jalan['id'] ?>"><?= $jalan['nama'] ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('jalan', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>TKP</label>
						<select class="form-control" name="tkp">
							<option value="">Pilih Nama TKP</option>
							<?php foreach ($this->tkp->read()->result_array() as $tkp): ?>
								<option <?= set_value('tkp', $data['tkp']) == $tkp['id']?'selected':'' ?> value="<?= $tkp['id'] ?>"><?= $tkp['nama'] ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('tkp', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Nominal Kerugian</label>
						<input type="text" class="form-control" name="nominal_kerugian" placeholder="Nominal Kerugian" data-type="currency" value="<?= $data['kerugian_nominal'] ?>">
						<?= form_error('nominal_kerugian', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Aksi</label>
						<select name="aksi" class="form-control">
							<option value="">Pilih Aksi Kejahatan</option>
							<option <?= set_value('aksi', $data['aksi']) == 'pembunuhan'?'selected':'' ?> value="pembunuhan">Pembunuhan</option>
							<option <?= set_value('aksi', $data['aksi']) == 'pencopetan'?'selected':'' ?> value="pencopetan">Pencopetan</option>
							<option <?= set_value('aksi', $data['aksi']) == 'pencurian'?'selected':'' ?> value="pencurian">Pencurian</option>
						</select>
						<?= form_error('aksi', '<span class="help-block error">', '</span>'); ?>
					</div>
					<div class="form-group">
						<label>Detail Kejadian</label>
						<textarea name="detail" class="form-control" placeholder="Detail Kejadian"><?= $data['deskripsi'] ?></textarea>
						<?= form_error('detail', '<span class="help-block error">', '</span>'); ?>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<a href="<?= base_url($this->router->fetch_class().'/jalan') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</a>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
	</form>
</section>

<script type="text/javascript">
$(document).ready(function() {
	var json_data = (name, id, callback) => {
		$.ajax({
			url: '<?= base_url($this->router->fetch_class().'/json_data/') ?>'+name+'/'+id,
			dataType: 'JSON',
			success: callback,
			error: (error) => {
				console.log(error)
			}
		});
	}

	var desa, dusun, jalan, tkp;
	$('select[name="desa"]').on('change', function() {
		desa = $(this).find(':selected').val();
		json_data('dusun', desa, function(data) {
			$('select[name="dusun"]').empty();
			$('select[name="dusun"]').append('<option value="">Pilih Nama Dusun</option>');
			data.forEach((key, index) => {
				$('select[name="dusun"]').append('<option value="'+key.id+'">'+key.nama+'</option>');
			});
		});
	});

	$('select[name="dusun"]').on('change', function() {
		dusun = $(this).find(':selected').val();
		json_data('jalan', dusun, function(data) {
			$('select[name="jalan"]').empty();
			$('select[name="jalan"]').append('<option value="">Pilih Nama Jalan</option>');
			data.forEach((key, index) => {
				$('select[name="jalan"]').append('<option value="'+key.id+'">'+key.nama+'</option>');
			});
		});
	});

	$('select[name="jalan"]').on('change', function() {
		jalan = $(this).find(':selected').val();
		json_data('tkp', jalan, function(data) {
			$('select[name="tkp"]').empty();
			$('select[name="tkp"]').append('<option value="">Pilih Nama TKP</option>');
			data.forEach((key, index) => {
				$('select[name="tkp"]').append('<option value="'+key.id+'">'+key.nama+'</option>');
			});
		});
	});
});
</script>
