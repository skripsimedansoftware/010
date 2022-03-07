<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/execute/') ?>" class="btn btn-<?= empty($jenis)?'success':'primary' ?>">Semua Data</a>
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/execute/pencurian-motor') ?>" class="btn btn-<?= $jenis == 'pencurian-motor'?'success':'primary' ?>">Pencurian Motor</a>
		<a href="<?= base_url($this->router->fetch_class().'/kmeans_clustering/execute/pencurian-ringan') ?>" class="btn btn-<?= $jenis == 'pencurian-ringan'?'success':'primary' ?>">Pencurian Ringan</a>
		<p>
			<br>
			<!-- <a class="btn btn-info">Pilih Centroid</a> -->
		</p>
	</div>
	<div class="box">
		<div class="box-body">
			<table class="datatable">
				<thead>
					<th>No</th>
					<th>Nomor Surat</th>
					<th>Tanggal</th>
					<th>Jenis</th>
					<th>Desa</th>
					<th>Kerugian Nominal</th>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= $value->nomor_surat ?></td>
							<td><?= nice_date($value->tanggal, 'd-m-Y') ?></td>
							<td><?= $value->jenis == 'pencurian-motor'?'Pencurian Sepeda Motor':'Pencurian Ringan' ?></td>
							<td><?= $this->desa->read(array('id' => $value->desa))->row()->nama ?></td>
							<td><?= $value->kerugian_nominal ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<div class="col-lg-12">
			<h3>Centroid Awal</h3>
		</div>
		<?php
		$result = array();
		$initial_centroid = $kmeans->getInitialCentroid();
		$col_width_centroid = (12/count($initial_centroid));
		foreach ($initial_centroid as $centroid)
		{
			?>
			<div class="col-lg-<?= $col_width_centroid;?> col-md-<?= $col_width_centroid;?> col-xs-<?= $col_width_centroid;?>">
				<table class="table table-hover table-striped table-bordered">
					<?php
					foreach ($centroid as $key => $val)
					{
						?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $val ?></td>
						</tr>
						<?php
					}
					?>
				</table>
			</div>
			<?php
		}

		if (!empty($data))
		{
			$i = 1;
			for (; ; ) {
				$kmeans->setIteration($i);
				$kmeans->run();
				if ($kmeans->isDone())
				{
					$result = $kmeans->getAllResults();
					break;
				}

				$i++;
			}

			$count_centroid = count($result['centroids']);
			$col_width_centroid = (12/$count_centroid);

			?>
			<div class="col-lg-12">
				<h3>Centroid Pusat</h3>
			</div>
			<?php

			foreach ($result['centroids'] as $centroid)
			{
				?>
				<div class="col-lg-<?= $col_width_centroid;?> col-md-<?= $col_width_centroid;?> col-xs-<?= $col_width_centroid;?>">
					<table class="table table-hover table-striped table-bordered">
						<?php
						foreach ($centroid as $key => $val)
						{
							?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $val ?></td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
				<?php
			}

			for ($iteration = 0; $iteration < $result['iteration']; $iteration++)
			{
				?>
				<div class="row">
					<div class="col-lg-12">
						<h3>Itersasi <?= ($iteration+1) ?></h3>
					</div>
					<?php
					foreach ($result['clusters']['iteration_'.($iteration+1)] as $cluster)
					{
						?>
						<div class="col-lg-<?= $col_width_centroid;?>">
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<th>Jenis</th>
									<th>Desa</th>
									<th>Dusun</th>
									<th>Jalan</th>
									<th>TKP</th>
									<th>Nominal Kerugian</th>
								</thead>
								<tbody>
									<?php
									foreach ($cluster as $item)
									{
										?>
										<tr>
											<td><?= $item['Jenis'] ?></td>
											<td><?= $item['Desa'] ?></td>
											<td><?= $item['Dusun'] ?></td>
											<td><?= $item['Jalan'] ?></td>
											<td><?= $item['TKP'] ?></td>
											<td><?= $item['Nominal Kerugian'] ?></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-lg-12 openstreetmap_large" id="openstreetmap"></div>
			</div>
			<script type="text/javascript">
			<?php
			$last_cluster = end($result['clusters']);

			$json_array = array();

			for ($c = 0; $c < count($last_cluster); $c++)
			{
				$json_array[$c] = array();

				foreach ($last_cluster[$c] as $data)
				{
					$desa = $this->desa->read(array('id' => $data['Desa']))->row_array();
					array_push($json_array[$c], $desa);
				}
			}

			echo 'var clusters = '.json_encode($json_array);
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

			var list = new Array();
			var count_data = new Array();

			for (c = 0; c < clusters.length; c++) {
				list[c] = L.layerGroup();
				for (item = 0; item < clusters[c].length; item++)
				{
					var find_index = find_value(count_data, 'id', clusters[c][item].id);
					if (find_index === false) {
						count_data.push({ id: clusters[c][item].id, cluster: c, count: 100, lat: clusters[c][item].lat, lon: clusters[c][item].lon });
					} else {
						count_data[find_index].count = count_data[find_index].count+100;
					}

					var find_count = find_value(count_data, 'id', clusters[c][item].id);
					find_count = count_data[find_count];

					L.marker([parseFloat(clusters[c][item].lat), parseFloat(clusters[c][item].lon)], {
					}).addTo(OpenStreetMap);
				}
			}

			for (r = 0; r < count_data.length; r++)
			{
				var color = '';
				var fill_color = '';

				if (count_data[r].cluster == 0)
				{
					color = 'blue';
					fill_color = '2f44fa';
				}
				else if (count_data[r].cluster == 1)
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
					fillOpacity: 0.5,
					fillColor: '#'+fill_color,
					radius: (count_data[r].count)
				}).addTo(OpenStreetMap);
			}

			</script>
			<?php
		}
		else
		{
			echo '<center><h3>Data Tidak Tersedia</h3></center>';
		}
		?>
		</div>
	</div>
</section>
