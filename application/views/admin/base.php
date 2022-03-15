<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $this->config->item('app_name') ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/') ?>SweetAlert2/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/') ?>DataTables/datatables.min.css">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<script src="<?= base_url('assets/adminlte/') ?>bower_components/jquery/dist/jquery.min.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Google Font -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
	<style type="text/css">
	.openstreetmap {
		border: 1px solid red;
		height: 350px;
		background: #f4f4f4;
	}
	.openstreetmap_large {
		height: 400px;
		width: 60%;
		margin-left: 10%;
		margin-right: 10%;
		background: #f4f4f4;
		border: 2px solid green;
	}

	.help-block.error {
		color: red;
	}

	.user-panel > .image > img {
		width: 45px;
		height: 45px;
		/*height: auto;*/
	}

	.swal2-popup { font-size: 1.6rem !important; }
	</style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="sidebar-mini hold-transition skin-green fixed">
<div class="wrapper">

	<!-- Main Header -->
	<header class="main-header">

		<!-- Logo -->
		<a href="<?= base_url() ?>" target="_blank" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>ADM</b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>ADMIN</b></span>
		</a>

		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account Menu -->
					<li class="dropdown user user-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!-- The user image in the navbar-->
							<img src="<?= (!empty($user->photo))?base_url('uploads/'.$user->photo):base_url('assets/adminlte/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
							<!-- hidden-xs hides the username on small devices so only the image appears. -->
							<span class="hidden-xs"><?= $user->full_name ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- The user image in the menu -->
							<li class="user-header">
								<img src="<?= (!empty($user->photo))?base_url('uploads/'.$user->photo):base_url('assets/adminlte/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
								<p><?= $user->full_name ?></p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="<?= base_url($this->router->fetch_class().'/profile') ?>" class="btn btn-default btn-flat">Profil</a>
								</div>
								<div class="pull-right">
									<a href="<?= base_url($this->router->fetch_class().'/logout') ?>" class="btn btn-default btn-flat">Keluar</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">

		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">

			<!-- Sidebar user panel (optional) -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?= (!empty($user->photo))?base_url('uploads/'.$user->photo):base_url('assets/adminlte/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" style="max-height: 45px;">
				</div>
				<div class="pull-left info">
					<p><?= $user->full_name ?></p>
					<!-- Status -->
					<a href="#"><i class="fa fa-circle text-success"></i> online</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MENU</li>
				<!-- Optionally, you can add icons to the links -->
				<li class="<?= $this->router->fetch_method() == 'index'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class()) ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
				<li class="<?= $this->router->fetch_method() == 'laporan_kriminal'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/laporan_kriminal') ?>"><i class="fa fa-file"></i> <span>Laporan Kriminal</span></a></li>
				<li class="treeview <?= in_array($this->router->fetch_method(), ['desa', 'dusun', 'jalan', 'tkp'])?'active':'' ?>">
					<a href="#"><i class="fa fa-database"></i> <span>Data</span>
						<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
					</a>
					<ul class="treeview-menu">
						<li class="<?= $this->router->fetch_method() == 'desa'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/desa') ?>">Desa</a></li>
						<li class="<?= $this->router->fetch_method() == 'dusun'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/dusun') ?>">Dusun</a></li>
						<li class="<?= $this->router->fetch_method() == 'jalan'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/jalan') ?>">Jalan</a></li>
						<li class="<?= $this->router->fetch_method() == 'tkp'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/tkp') ?>">TKP</a></li>
					</ul>
				</li>
				<li class="treeview <?= $this->router->fetch_method() == 'kmeans_clustering'?'active':'' ?>">
					<a href="#"><i class="fa fa-sitemap"></i> <span>K-Means</span>
						<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
					</a>
					<ul class="treeview-menu">
						<li class="<?= $this->uri->segment(3) == 'data_tabular'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/data_tabular') ?>">Tabular</a></li>
						<li class="<?= $this->uri->segment(3) == 'execute'?'active':'' ?>"><a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/') ?>">Cluster</a></li>
					</ul>
				</li>
			</ul>
			<!-- /.sidebar-menu -->
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<?= $page ?>
	</div>
	<!-- /.content-wrapper -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="pull-right hidden-xs">
			<?= $this->config->item('app_name').' by '.$this->config->item('app_user'); ?>
		</div>
		<!-- Default to the left -->
		<strong>Copyright &copy; <?= date('Y') ?> <a href="#"><?= $this->config->item('app_name'); ?></a>.</strong> All rights reserved.
	</footer>

	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- JQuery InputMask -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/') ?>SweetAlert2/dist/sweetalert2.all.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/plugins/') ?>DataTables/datatables.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>

<script type="text/javascript">
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#profile-upload-preview').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

function formatCurrency(input, blur) {
	// appends $ to value, validates decimal side
	// and puts cursor back in right position.
	//
	function formatNumber(n) {
		// format number 1000000 to 1,234,567
		return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}

		// get input value
	var input_val = input.val();

	// don't validate empty input
	if (input_val === "") { return; }

	// original length
	var original_len = input_val.length;

	// initial caret position
	var caret_pos = input.prop("selectionStart");

	// check for decimal
	if (input_val.indexOf(".") >= 0) {

		// get position of first decimal
		// this prevents multiple decimals from
		// being entered
		var decimal_pos = input_val.indexOf(".");

		// split number by decimal point
		var left_side = input_val.substring(0, decimal_pos);
		var right_side = input_val.substring(decimal_pos);

		// add commas to left side of number
		left_side = formatNumber(left_side);

		// validate right side
		right_side = formatNumber(right_side);

		// On blur make sure 2 numbers after decimal
		if (blur === "blur") {
			right_side += "00";
		}

		// Limit decimal to only 2 digits
		right_side = right_side.substring(0, 2);

		// join number by .
		input_val = left_side + "." + right_side;

	} else {
		// no decimal entered
		// add commas to number
		// remove all non-digits
		input_val = formatNumber(input_val);
		input_val = input_val;

		// final formatting
		if (blur === "blur") {
			input_val += ".00";
		}
	}

	// send updated string to input
	input.val(input_val);

	// put caret back in the right position
	var updated_len = input_val.length;
	caret_pos = updated_len - original_len + caret_pos;
	input[0].setSelectionRange(caret_pos, caret_pos);
}

$("input[data-type='currency']").on({
	keyup: function() {
		formatCurrency($(this));
	},
	blur: function() {
		formatCurrency($(this), "blur");
	}
});


$('.datatable').DataTable({
	responsive: false,
	dom: 'Bfrtip',
	buttons: [
		'copyHtml5',
		'excelHtml5',
		'csvHtml5',
		'pdfHtml5'
	]
});
$('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
</script>
</body>
</html>
