<?php defined('BLUDIT') or die('Bludit'); ?>
<div class="container mb-2">
<div class="row">

	<div class="col-lg-8 col-md-10 mx-auto">

		<h2 class="my-4">
			<?php echo $_item['name'] ?>
		</h2>

		<div class="my-4">
			<img src="<?php echo $_item['screenshoot_url'] ?>" class="img-fluid item-screenshot" alt="Responsive image">
		</div>

		<div class="my-4">
			<h3 class="my-3"><?php l('Description') ?></h3>
			<p><?php echo $_item['description'] ?></p>
		</div>

		<div class="my-4">
			<h3 class="my-3"><?php l('Features') ?></h3>
			<ul class="features">
				<?php
					foreach ($_item['features'] as $feature) {
						if (!empty($feature)) {
							echo '<li>'.$feature.'</li>';
						}
					}
				?>
			</ul>
		</div>

		<div class="my-4">
		<h4 class="my-3"><?php l('Last Update') ?>: <?php echo $_item['release_date'] ?></h4>
		</div>

		<div class="my-4">
		<h4 class="my-3"><?php l('Version') ?>: <?php echo $_item['version'] ?></h4>
		</div>

		<div class="my-4">
		<h4><?php l('Author') ?> <?php echo $_item['author']['name'] ?></h4>
			<?php
				if (!empty($_item['author']['facebook'])) {
					echo'<a class="author-social" href="'.$_item['author']['facebook'].'" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['twitter'])) {
					echo'<a class="author-social" href="'.$_item['author']['twitter'].'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['github'])) {
					echo'<a class="author-social" href="'.$_item['author']['github'].'" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['youtube'])) {
					echo'<a class="author-social" href="'.$_item['author']['youtube'].'" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['reddit'])) {
					echo'<a class="author-social" href="'.$_item['author']['reddit'].'" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['pinterest'])) {
					echo'<a class="author-social" href="'.$_item['author']['pinterest'].'" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['flickr'])) {
					echo'<a class="author-social" href="'.$_item['author']['flickr'].'" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['google_plus'])) {
					echo'<a class="author-social" href="'.$_item['author']['google_plus'].'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>'.PHP_EOL;
				}
				if (!empty($_item['author']['vk'])) {
					echo'<a class="author-social" href="'.$_item['author']['vk'].'" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>'.PHP_EOL;
				}
			?>
		</div>

		<div class="my-5">
			<?php
				if (!empty($_item['demo_url'])) {
					echo '<a class="btn btn-primary" href="'.$_item['demo_url'].'" role="button" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> '.l('Live Demo',false).'</a>'.PHP_EOL;
				}

				if ($_item['price_usd']>0) {
					echo '<a class="btn btn-secondary" href="'.$_item['download_url'].'" role="button" target="_blank"><i class="fa fa-shopping-cart" aria-hidden="true"></i> '.l('Buy',false).' $'.$_item['price_usd'].'</a>'.PHP_EOL;
				} else {
					echo '<a class="btn btn-secondary" href="'.$_item['download_url'].'" role="button" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> '.l('Free Download',false).'</a>'.PHP_EOL;
				}

				if (!empty($_item['information_url'])) {
					echo '<a class="btn btn-secondary" href="'.$_item['information_url'].'" role="button" target="_blank"><i class="fa fa-info" aria-hidden="true"></i> '.l('More information',false).'</a>'.PHP_EOL;
				}
			?>
		</div>

	</div>
</div>
</div>