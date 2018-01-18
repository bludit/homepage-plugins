<?php defined('BLUDIT') or die('Bludit'); ?>
<!-- Page Content -->
<div class="container">

	<!-- Page Heading -->
	<h4 class="my-5 text-center"><?php l('little-description-paragraph1') ?></h4>

	<div class="row my-5">
		<input type="text" class="form-control" id="search" placeholder="<?php l('Search') ?>">
	</div>

	<div class="row my-5">

		<?php foreach ($_items as $item): ?>

			<div class="col-lg-6 item">
			<div class="card h-100">
				<!-- <a href="<?php echo $item['permalink'] ?>"><img class="card-img-top" src="<?php echo $item['screenshoot_url'] ?>" alt="Screenshoot"></a> -->
				<div class="card-body">
					<h4 class="card-title"><a href="<?php echo $item['permalink'] ?>"><?php echo $item['name'] ?></a></h4>
					<h6 class="card-subtitle mb-3"><?php l('Made by') ?> <?php echo $item['author']['name'] ?></h6>
					<p class="card-description"><?php echo $item['description'] ?></p>
					<?php
						if (!empty($item['demo_url'])) {
							echo '<a class="btn btn-primary btn-sm" href="'.$item['demo_url'].'" role="button" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> '.l('Live Demo',false).'</a>'.PHP_EOL;
						}

						if ($item['price_usd']>0) {
							echo '<a class="btn btn-secondary btn-sm" href="'.$item['download_url'].'" role="button" target="_blank"><i class="fa fa-shopping-cart" aria-hidden="true"></i> '.l('Buy',false).' $'.$item['price_usd'].'</a>'.PHP_EOL;
						} else {
							echo '<a class="btn btn-secondary btn-sm" href="'.$item['download_url'].'" role="button" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> '.l('Free Download',false).'</a>'.PHP_EOL;
						}
					?>
				</div>
			</div>
			</div>

		<?php endforeach ?>

	</div>

</div>
