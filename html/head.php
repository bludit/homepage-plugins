<?php defined('BLUDIT') or die('BLUDIT'); ?>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="index, follow">

	<?php
		if ($_item!==false) {
			echo '<title>'.$_item['name'].' - '.l('head title', false).'</title>'.PHP_EOL;
			echo '<meta name="description" content="'.$_item['description'].'">'.PHP_EOL;
		} else {
			echo '<title>'.l('head title', false).'</title>'.PHP_EOL;
			echo '<meta name="description" content="'.l('head description', false).'">'.PHP_EOL;
		}
	?>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo DOMAIN ?>/img/favicon.png">

	<!-- Twitter Cards -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@bludit" />
	<?php
		if ($_item!==false) {
			echo '<meta name="twitter:title" content="'.$_item['name'].' - '.l('head title', false).'" />'.PHP_EOL;
			echo '<meta name="twitter:description" content="'.$_item['description'].'" />'.PHP_EOL;
			echo '<meta name="twitter:image" content="'.$_item['screenshoot_twitter_url'].'" />'.PHP_EOL;
		} else {
			echo '<meta name="twitter:title" content="'.l('head title', false).'" />'.PHP_EOL;
			echo '<meta name="twitter:description" content="'.l('head description', false).'" />'.PHP_EOL;
			echo '<meta name="twitter:image" content="https://df6m0u2ovo2fu.cloudfront.net/images/bludit-twitter-cards.png" />'.PHP_EOL;
		}
	?>

	<!-- Open Graph -->
	<meta property="og:locale" content="<?php echo $currentLanguage ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:alt" content="Bludit Logo" />
	<?php
		if ($_item!==false) {
			echo '<meta property="og:url" content="'.$_item['permalink'].'" />'.PHP_EOL;
			echo '<meta property="og:title" content="'.$_item['name'].' - '.l('head title', false).'" />'.PHP_EOL;
			echo '<meta property="og:description" content="'.$_item['description'].'" />'.PHP_EOL;
			echo '<meta property="og:image" content="'.$_item['screenshoot_facebook_url'].'" />'.PHP_EOL;
		} else {
			echo '<meta property="og:url" content="'.$_topbar['website'].'" />'.PHP_EOL;
			echo '<meta property="og:title" content="'.l('head title', false).'" />'.PHP_EOL;
			echo '<meta property="og:description" content="'.l('head description', false).'" />'.PHP_EOL;
			echo '<meta property="og:image" content="https://df6m0u2ovo2fu.cloudfront.net/images/bludit-facebook-cards.png" />'.PHP_EOL;
		}
	?>

	<!-- CSS files -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo DOMAIN ?>/css/bludit.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Google hreflang tag -->
	<?php foreach ($_hreflang as $hreflang=>$href): ?>
	<link rel="alternate" hreflang="<?php echo $hreflang ?>" href="<?php echo $href ?>" />
	<?php endforeach ?>

	<!-- Canonical URL -->
	<link rel="canonical" href="<?php echo $_canonicalURL ?>">
</head>
