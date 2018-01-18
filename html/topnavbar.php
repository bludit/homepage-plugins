<?php defined('BLUDIT') or die('Bludit'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo $_topbar['website'] ?>">
			<img src="<?php echo DOMAIN ?>/img/bludit-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
			<span class="text-white">BLUDIT</span>
			<span class="ml-1 text-muted"><?php l('Plugins') ?></span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="<?php echo $_topbar['themes'] ?>"><?php l('Themes') ?></a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo $_topbar['plugins'] ?>"><?php l('Plugins') ?></a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo $_topbar['documentation'] ?>"><?php l('Documentation') ?></a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo $_topbar['pro'] ?>">BLUDIT PRO</a></li>
			</ul>
		</div>
	</div>
</nav>