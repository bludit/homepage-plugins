<?php defined('BLUDIT') or die('BLUDIT'); ?>

<div class="container mb-2">
	<div class="row">
		<div id="plugin-content" class="col-lg-8 col-sm-12 pt-5 pb-lg-5">
			<div class="card">
				<?php if(!$_item['translated']){ ?>
					<div class="card-img-top p-3 bg-danger" style="height:auto;margin-bottom:-5px;">
						<a href="https://github.com/bludit/plugins-repository/tree/master/items/<?php echo $_item['key'] ?>" target="_blank" class="text-white">
							<?php l("this-plugin-has-not-yet-been-translated-into") ?>
						</a>
					</div>
				<?php } ?>

				<div id="screenshot" class="card-img-top"><span><?php echo $_item['name'] ?></span></div>

				<script>
				document.addEventListener("DOMContentLoaded", function() {
					$.get("<?php echo $_item['screenshoot_url'] ?>").done(function() {
						$("#screenshot").attr('style', 'background-size: cover; background-image: url("<?php echo $_item['screenshoot_url'] ?>")').html('');
					});
				});
				</script>

				<div class="card-body">
					<h5 class="card-title"><?php echo $_item['name'] ?></h5>
					<p class="card-text"><?php echo $_item['description'] ?></p>
				</div>

				<?php
					$_item['features'] = array_filter($_item['features']);
					if(count($_item['features']) > 0){
						?><ul class="list-group list-group-flush"><?php
						foreach($_item['features'] AS $feature){
							?><li class="list-group-item bg-light text-muted"><small><?php echo $feature; ?></small></li><?php
						}
						?></ul><?php
					}
				?>
			</div>

			<div id="plugin-links" class="row mt-4">
				<div class="col-md-4 col-sm-12">
					<?php if(!empty($_item['demo_url'])){ ?>
						<a href="<?php echo $_item['demo_url']; ?>" class="btn btn-dark" target="_blank">
							<i class="fa fa-external-link" aria-hidden="true"></i> <?php l("Live Demo"); ?>
						</a>
					<?php } ?>
				</div>
				<div class="col-md-8 col-sm-12 text-right">
					<?php if($_item['price_usd'] > 0){ ?>
						<a href="<?php echo $_item['download_url']; ?>" class="btn btn-primary" target="_blank" role="button">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php l("Buy"); ?> $<?php echo $_item['price_usd']; ?>
						</a>
					<?php } else if($_item['price_usd'] == -1){ ?>
						<a href="<?php echo $_item['download_url']; ?>" class="btn btn-primary" target="_blank" role="button">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php l("Buy from"); ?> $1
						</a>
					<?php } else { ?>
						<?php if(!empty($_item['download_url_v2'])){ ?>
							<a href="<?php echo $_item['download_url_v2']; ?>" class="btn btn-secondary" target="_blank" role="button">
								<i class="fa fa-download" aria-hidden="true"></i> <?php l("download-for-bludit-v2"); ?>
							</a>
						<?php } ?>
						<?php if(!empty($_item['download_url'])){ ?>
							<a href="<?php echo $_item['download_url']; ?>" class="btn btn-primary" target="_blank" role="button">
								<i class="fa fa-download" aria-hidden="true"></i> <?php l("download-for-bludit-v3"); ?>
							</a>
						<?php } ?>
					<?php } ?>
				</div>
			</div>

			<div class="card mt-4 mb-4">
				<div class="card-body">
					<h5 class="card-title"><?php l("Author"); ?>: <b><?php echo $_item['author']['name'] ?></b></h5>
					<?php
						if(!empty($_item['author']['website'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['website'].'" target="_blank"><i class="fa fa-home" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['facebook'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['facebook'].'" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['twitter'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['twitter'].'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['github'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['github'].'" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['youtube'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['youtube'].'" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['reddit'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['reddit'].'" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['pinterest'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['pinterest'].'" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['flickr'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['flickr'].'" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a>'.PHP_EOL;
						}
						if(!empty($_item['author']['vk'])){
							echo'<a class="btn btn-outline-secondary" href="'.$_item['author']['vk'].'" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>'.PHP_EOL;
						}
					?>
				</div>
			</div>
		</div>

		<div id="plugin-sidebar" class="col-lg-4 col-sm-12 pt-lg-5 pb-5 pl-lg-5">
			<div class="card mb-4">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<small class="w-50 d-inline-block font-weight-bold"><?php l("Version"); ?></small>
						<small><?php echo $_item["version"]; ?></small>
					</li>
					<li class="list-group-item">
						<small class="w-50 d-inline-block font-weight-bold"><?php l("Last Update"); ?></small>
						<small><?php echo timeago(strtotime($_item["release_date"] . " 00:00:00")); ?> <?php l("ago"); ?></small>
					</li>
				</ul>
			</div>

			<?php if(!empty($_item['information_url'])){ ?>
				<div class="card mt-4 mb-4">
					<div class="card-body">
						<div class="card-title"><?php l('Support') ?></div>
						<div class="card-subtitle mb-2 text-muted"><?php l('for-more-information-or-extra') ?></div>

						<a href="<?php echo $_item['information_url']; ?>" class="btn btn-primary w-100 mt-3" target="_blank">
							<i class="fa fa-home" aria-hidden="true"></i> <?php l('More information') ?>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
