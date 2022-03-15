<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Sistem <?= $this->config->item('app_name'); ?>
			<small>By <?= $this->config->item('app_user'); ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url($this->router->fetch_class()) ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
			<li class="active"><?= $this->config->item('app_name'); ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="callout callout-info">
			<h4>Selamat Datang!</h4>
			<p>Di Maps Daerah Rawan Kriminologi, dengan halaman peta tempat yang akan ditampilkan di titik lokasi rawan kriminalitas</p>
		</div>
		<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
