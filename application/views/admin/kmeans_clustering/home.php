<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
		<?php
		if (!empty($data))
		{
			$i = 1;
			for (; ; ) {
				$kmeans->setIteration($i);
				$kmeans->run();
				if ($kmeans->isDone()) {

					// echo "<pre>";
					// print_r ($kmeans->getCentroid());
					// echo "</pre>";

					// echo 'Iteration ended on : '.$kmeans->countIterations();

					// echo "<pre>";
					// print_r ($kmeans->catchLogs());
					// echo "</pre>";

					echo "<pre>";
					print_r ($kmeans->getAllResults());
					echo "</pre>";
					break;
				}

				$i++;
			}
		}
		else
		{
			echo '<center><h3>Data Tidak Tersedia</h3></center>';
		}
		?>
		</div>
		<div class="box-footer">
		</div>
	</div>
</section>
