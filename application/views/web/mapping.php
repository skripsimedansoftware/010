<!-- Full Width Column -->
<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Sistem <?= $this->config->item('app_name'); ?>
			<small>By <?= $this->config->item('app_user'); ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url($this->router->fetch_class()) ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
			<?php if ($this->router->fetch_method() == 'mapping_motor') :
				$type = 'Pencurian Kendaraan Bermotor';
			?>
				<li class="active">Pencurian Motor</li>
			<?php elseif ($this->router->fetch_method() == 'mapping_ringan') :
				$type = 'Pencurian Ringan';
			?>
				<li class="active">Pencurian Ringan</li>
			<?php else:
				$type = 'Data Keseluruhan';
			?>
				<li class="active">Pemetaan Keseluruhan</li>
			<?php endif; ?>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-8 openstreetmap_large" id="openstreetmap"></div>
			<div class="col-lg-4">
				Peta disamping ialah gambaran dari klasterisasi kejahatan dalam bentuk <?= $type ?> pada dengan tingkatan  sebagai berikut :
				<ul>
					<li><b>Tinggi</b></li>
					<ol>
						<li>Warna Indikator :
							<p>
								Pada tingkatan ini warna yang digunakan adalah <span style="font-weight: bold; color: #ff1e0a;">merah</span>
							</p>
						</li>
						<li>Lingkaran Radius :
							<p>
								Semakin besar radius yang terlihat maka semakin banyak pula terjadi tindakan kriminal di tempat tersebut atau semakin besar resiko mungkin akan didapatkan
							</p>
						</li>
					</ol>
					<li><b>Sedang</b></li>
					<ol>
						<li>Warna Indikator :
							<p>
								Pada tingkatan ini warna yang digunakan adalah <span style="font-weight: bold; color: #ff470a;">orange</span>
							</p>
						</li>
						<li>Lingkaran Radius :
							<p>
								Semakin besar radius yang terlihat maka semakin banyak pula terjadi tindakan kriminal di tempat tersebut atau semakin besar resiko mungkin akan didapatkan
							</p>
						</li>
					</ol>
					<li><b>Rendah</b></li>
					<ol>
						<li>Warna Indikator :
							<p>
								Pada tingkatan ini warna yang digunakan adalah <span style="font-weight: bold; color: #2f44fa;">biru</span>
							</p>
						</li>
						<li>Lingkaran Radius :
							<p>
								Semakin besar radius yang terlihat maka semakin banyak pula terjadi tindakan kriminal di tempat tersebut atau semakin besar resiko mungkin akan didapatkan
							</p>
						</li>
					</ol>
				</ul>
			</div>
		</div>
		<div class="row">
			<?php
			$high = array_map(function($data) {
				return ($data->level == 'tinggi') ? $data : FALSE;
			}, $data);

			$high = array_filter($high);

			$medium = array_map(function($data) {
				return ($data->level == 'sedang') ? $data : FALSE;
			}, $data);

			$medium = array_filter($medium);

			$low = array_map(function($data) {
				return ($data->level == 'rendah') ? $data : FALSE;
			}, $data);

			$low = array_filter($low);
			?>
			<div class="box">
				<div class="box-body">
					<div class="col-lg-4">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th colspan="4" class="text-center"><span style="color: #ff1e0a;">Tinggi</span></th>
								</tr>
								<th>#</th>
								<th>Laporan</th>
								<th>Desa</th>
								<th>Kerugian</th>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($high as $value) :
								$laporan = $this->laporan_kriminal->read(array('id' => $value->laporan));
								$laporan = $laporan->row_array();
								$desa = $this->desa->read(array('id' => $laporan['desa']));
								$desa = $desa->row_array();
								?>
									<tr>
										<td>
											<?= $i ?>
										</td>
										<td><?= $laporan['jenis'] == 'pencurian-motor' ? 'Pencurian Motor' : 'Pencurian Ringan' ?></td>
										<td><?= $desa['nama'] ?></td>
										<td>Rp. <?= number_format($laporan['kerugian_nominal'], 0, ',', '.') ?></td>
									</tr>
								<?php 
								$i++;
								endforeach;
								?>
							</tbody>
						</table>
					</div>
					<div class="col-lg-4">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th colspan="4" class="text-center"><span style="color: #ff470a;">Sedang</span></th>
								</tr>
								<th>#</th>
								<th>Laporan</th>
								<th>Desa</th>
								<th>Kerugian</th>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($medium as $value) :
								$laporan = $this->laporan_kriminal->read(array('id' => $value->laporan));
								$laporan = $laporan->row_array();
								$desa = $this->desa->read(array('id' => $laporan['desa']));
								$desa = $desa->row_array();
								?>
									<tr>
										<td>
											<?= $i ?>
										</td>
										<td><?= $laporan['jenis'] == 'pencurian-motor' ? 'Pencurian Motor' : 'Pencurian Ringan' ?></td>
										<td><?= $desa['nama'] ?></td>
										<td>Rp. <?= number_format($laporan['kerugian_nominal'], 0, ',', '.') ?></td>
									</tr>
								<?php 
								$i++;
								endforeach;
								?>
							</tbody>
						</table>
					</div>
					<div class="col-lg-4">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th colspan="4" class="text-center"><span style="color: #2f44fa;">Rendah</span></th>
								</tr>
								<th>#</th>
								<th>Laporan</th>
								<th>Desa</th>
								<th>Kerugian</th>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($low as $value) :
								$laporan = $this->laporan_kriminal->read(array('id' => $value->laporan));
								$laporan = $laporan->row_array();
								$desa = $this->desa->read(array('id' => $laporan['desa']));
								$desa = $desa->row_array();
								?>
									<tr>
										<td>
											<?= $i ?>
										</td>
										<td><?= $laporan['jenis'] == 'pencurian-motor' ? 'Pencurian Motor' : 'Pencurian Ringan' ?></td>
										<td><?= $desa['nama'] ?></td>
										<td>Rp. <?= number_format($laporan['kerugian_nominal'], 0, ',', '.') ?></td>
									</tr>
								<?php 
								$i++;
								endforeach;
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<script type="text/javascript">
<?php
$json_array = array();
foreach ($data as $key => $value)
{
	$json_array[$value->level] = array();
}

foreach ($data as $key => $value)
{
	$laporan = $this->laporan_kriminal->read(array('id' => $value->laporan));

	if ($laporan->num_rows() >= 1)
	{
		$laporan = $laporan->row();
		$desa = $this->desa->read(array('id' => $laporan->desa))->row_array();
		array_push($json_array[$value->level], $desa);
	}
}

echo 'var clusters = '.json_encode($json_array).';';
?>
const DEFAULT_COORDINATE = [1.8576037, 100.1506541];

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

var find_value = (arrayName, searchKey, searchValue) => {
	let find = arrayName.findIndex(i => i[searchKey] == searchValue);
	return (find !== -1)?find:false;
}

var count_data = new Array();

Object.keys(clusters).forEach((level, c) => {
	for (item = 0; item < clusters[level].length; item++)
	{
		var find_index = find_value(count_data, 'id', clusters[level][item].id);
		if (find_index === false) {
			count_data.push({ id: clusters[level][item].id, cluster: level, count: 120, lat: clusters[level][item].lat, lon: clusters[level][item].lon });
		} else {
			count_data[find_index].count = count_data[find_index].count+120;
		}

		var find_count = find_value(count_data, 'id', clusters[level][item].id);
		find_count = count_data[find_count];

		L.marker([parseFloat(clusters[level][item].lat), parseFloat(clusters[level][item].lon)], {
		}).addTo(OpenStreetMap);
	}
});

for (r = 0; r < count_data.length; r++)
{
	var color = '';
	var fill_color = '';

	if (count_data[r].cluster == 'rendah')
	{
		color = 'blue';
		fill_color = '2f44fa';
	}
	else if (count_data[r].cluster == 'sedang')
	{
		color = 'orange';
		fill_color = 'ff470a';
	}
	else
	{
		color = 'red';
		fill_color = 'ff1e0a';
	}

	L.circle([parseFloat(count_data[r].lat), parseFloat(count_data[r].lon)], {
		color: color,
		fillOpacity: 0.2,
		fillColor: '#'+fill_color,
		radius: (count_data[r].count/4)
	}).addTo(OpenStreetMap);
}
</script>
1
