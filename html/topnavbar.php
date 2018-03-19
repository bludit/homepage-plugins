<?php defined('BLUDIT') or die('BLUDIT'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo $_topbar['website'] ?>">
			<img src="<?php echo DOMAIN ?>/img/bludit-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
			<span class="text-white">BLUDIT</span>
			<span class="ml-1 text-muted"><?php l('Themes') ?></span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $_topbar['themes'] ?>"><?php l('themes') ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $_topbar['plugins'] ?>"><?php l('plugins') ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $_topbar['documentation'] ?>"><?php l('documentation') ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $_topbar['pro'] ?>">Bludit PRO</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="https://plugins.bludit.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i></a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="https://plugins.bludit.com">English</a>
						<a class="dropdown-item" href="https://plugins.bludit.com/de/">Deutsch</a>
						<a class="dropdown-item" href="https://plugins.bludit.com/es/">Español</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
