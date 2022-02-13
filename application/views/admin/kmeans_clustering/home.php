<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>K-Means<small>Clustering</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box">
		<div class="box-body">
<?php
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
?>
		</div>
		<div class="box-footer">

		</div>
	</div>
</section>
