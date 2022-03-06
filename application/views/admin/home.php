<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Admin<small>Dashboard</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?= $this->desa->count(); ?></h3>
					<p>Desa</p>
				</div>
				<div class="icon">
					<i class="fa fa-map-o"></i>
				</div>
				<a href="<?= base_url($this->router->fetch_class().'/desa') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $this->dusun->count(); ?></h3>
					<p>Dusun</p>
				</div>
				<div class="icon">
					<i class="fa fa-map-marker"></i>
				</div>
				<a href="<?= base_url($this->router->fetch_class().'/dusun') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?= $this->jalan->count(); ?></h3>
					<p>Jalan</p>
				</div>
				<div class="icon">
					<i class="fa fa-road"></i>
				</div>
				<a href="<?= base_url($this->router->fetch_class().'/jalan') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?= $this->tkp->count(); ?></h3>
					<p>TKP</p>
				</div>
				<div class="icon">
					<i class="fa fa-map-pin"></i>
				</div>
				<a href="<?= base_url($this->router->fetch_class().'/tkp') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
</section>
<div id="map"></div>
<script type="text/javascript">
function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUtdrrTnHwAL0aTKSR5xwcjW7xoOTtE4s&callback=initMap&v=weekly" async></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>