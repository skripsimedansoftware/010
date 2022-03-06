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
			<input type="hidden" name="coordinate_lat">
			<input type="hidden" name="coordinate_lon">
			<div class="col-lg-6 openstreetmap" id="openstreetmap"></div>
			<div class="box-footer">
				<a href="<?= base_url($this->router->fetch_class().'/desa') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</a>
				<button class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
			</div>
		</div>
	</form>
</section>

<script type="text/javascript">
/**
 * Reference https://leafletjs.com/SlavaUkraini/reference.html
 */

const DEFAULT_COORDINATE = [1.8576037, 100.1506541];

$('input[name="coordinate_lat"]').val(DEFAULT_COORDINATE[0]);
$('input[name="coordinate_lon"]').val(DEFAULT_COORDINATE[1]);

// initial map
const OpenStreetMap = L.map('openstreetmap');

// initial osm tile url
const osmTileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const attrib = '<?= $this->config->item('app_name'); ?> <small>By</small> <a href="<?= base_url() ?>"><?= $this->config->item('app_user'); ?><a>';
const osmTile = new L.TileLayer(osmTileUrl, { minZoom: 2, maxZoom: 20, attribution: attrib });

// add layer
// https://leafletjs.com/reference-1.6.0.html#layer
OpenStreetMap.setView(new L.LatLng(DEFAULT_COORDINATE[0], DEFAULT_COORDINATE[1]), 12);
OpenStreetMap.addLayer(osmTile);

const Marker = L.marker(DEFAULT_COORDINATE).addTo(OpenStreetMap);

// click listener
// https://leafletjs.com/reference-1.6.0.html#evented
OpenStreetMap.on('click', function(e) {
	const { lat, lng } = e.latlng;
	Marker.setLatLng([lat, lng]);
	$('input[name="coordinate_lat"]').val(lat);
	$('input[name="coordinate_lon"]').val(lng);
});
</script>
