<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
			<table class="table table-hover table-striped datatable">
				<thead>
					<th>No</th>
					<th>Jenis</th>
					<th>Desa</th>
					<th>Dusun</th>
					<th>Jalan</th>
					<th>TKP</th>
					<th>Aksi</th>
					<th>Nominal Kerugian</th>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value) : ?>
					<?php
					switch ($value->aksi) {
						case 'pembunuhan':
							$aksi = 3;
						break;

						case 'pencopetan':
							$aksi = 2;
						break;

						case 'pencurian':
							$aksi = 1;
						break;

						default:
							$aksi = 0;
						break;
					}
					?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= ($value->jenis == 'pencurian-motor')?1:2 ?></td>
						<td><?= $value->desa ?></td>
						<td><?= $value->dusun ?></td>
						<td><?= $value->jalan ?></td>
						<td><?= $value->tkp ?></td>
						<td><?= $aksi ?></td>
						<td><?= $value->kerugian_nominal ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer">

		</div>
	</div>
</section>
