<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $this->config->item('app_name'); ?> by <?= $this->config->item('app_user'); ?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/skins/_all-skins.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<script src="<?= base_url('assets/adminlte/') ?>bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?= base_url('assets/adminlte/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?= base_url('assets/adminlte/') ?>bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>

		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
		<style type="text/css">
		.openstreetmap {
			border: 1px solid red;
			height: 350px;
			background: #f4f4f4;
		}

		.openstreetmap_large {
			height: 400px;
			width: 60%;
			background: #f4f4f4;
			border: 2px solid green;
		}

		.skin-red .main-header .navbar {
			background-color: #bb1369;
		}

		</style>
	</head>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-red layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<a href="<?= base_url() ?>" class="navbar-brand"><b><?= $this->config->item('app_name'); ?></b></a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="<?= $this->router->fetch_method() == 'index' ? 'active' : '' ?>"><a href="<?= base_url() ?>">Beranda</a></li>
								<li class="<?= $this->router->fetch_method() == 'mapping_global' ? 'active' : '' ?>"><a href="<?= base_url($this->router->fetch_class().'/mapping_global') ?>">Pemetaan</a></li>
								<li class="<?= $this->router->fetch_method() == 'mapping_motor' ? 'active' : '' ?>"><a href="<?= base_url($this->router->fetch_class().'/mapping_motor') ?>">Map - Pencurian Motor</a></li>
								<li class="<?= $this->router->fetch_method() == 'mapping_ringan' ? 'active' : '' ?>"><a href="<?= base_url($this->router->fetch_class().'/mapping_ringan') ?>">Map - Pencurian Ringan</a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
						<!-- Navbar Right Menu -->
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<li><a href="<?= base_url('admin') ?>">Masuk</a></li>
							</ul>
						</div>
						<!-- /.navbar-custom-menu -->
					</div>
					<!-- /.container-fluid -->
				</nav>
			</header>
			<div class="content-wrapper">
				<?= $content ?>
			</div>
			<footer class="main-footer">
				<div class="container">
					<div class="pull-right hidden-xs">
						<b>Calon Sarjana S.Kom</b> - Dinda Budiarti
					</div>
					<strong>Copyright &copy; <?= date('Y') ?> <a href="https://uinsu.ac.id">Universitas Negeri Sumatera Utara</a>.</strong>
				</div>
				<!-- /.container -->
			</footer>
		</div>
	</body>
</html>
