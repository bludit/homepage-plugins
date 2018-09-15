<?php defined('BLUDIT') or die('BLUDIT');

// Language passed via $_GET['l']
$currentLanguage = 'en';
$acceptedLanguages = array('en', 'de', 'es', 'it');
if (isset($_GET['l'])) {
	if (in_array($_GET['l'], $acceptedLanguages)) {
		$currentLanguage = $_GET['l'];
	}
}

$json = file_get_contents(PATH_ROOT.'languages'.DS.$currentLanguage.'.json');
$languageArray = json_decode($json, true);

// Top bar links
if ($currentLanguage !== "en") {
	$_topbar = array(
		'documentation'=>'https://docs.bludit.com',
		'themes'=>'https://themes.bludit.com/'.$currentLanguage.'/',
		'plugins'=>'https://plugins.bludit.com/'.$currentLanguage.'/',
		'pro'=>'https://pro.bludit.com/'.$currentLanguage.'/',
		'website'=>DOMAIN.'/'.$currentLanguage.'/'
	);
} else {
	$_topbar = array(
		'documentation'=>'https://docs.bludit.com',
		'themes'=>'https://themes.bludit.com',
		'plugins'=>'https://plugins.bludit.com',
		'pro'=>'https://pro.bludit.com',
		'website'=>DOMAIN
	);
}

// Items and Item passed via $_GET['item']
$_items = false;
$_item = false;
$_whereAmI = 'home';
$_hreflang = array();
$_canonicalURL = '';

if (!empty($_GET['item'])) {
	$itemName = sanitize($_GET['item']);
	$_item = getItem($itemName);
	$_whereAmI = 'item';
	if ($_item===false) {
		header("HTTP/1.0 404 Not Found");
		exit;
	} else {
		// Canonical URL
		$_canonicalURL = $_item['permalink'];

		// hreflang
		$_hreflang = array('en'=>rtrim(DOMAIN,'/').'/'.ITEM_TYPE.'/'.$itemName);
		$tmpLanguages = $acceptedLanguages;
		unset($tmpLanguages[0]);
		foreach ($tmpLanguages as $lang) {
			$_hreflang[$lang] = rtrim(DOMAIN,'/').'/'.$lang.'/'.ITEM_TYPE.'/'.$itemName;
		}
	}
} else {
	$_items = getItems();
	$_whereAmI = 'home';

	// Canonical URL
	$_canonicalURL = $_topbar['website'];

	// hreflang
	$_hreflang = array('en'=>DOMAIN);
	$tmpLanguages = $acceptedLanguages;
	unset($tmpLanguages[0]);
	foreach ($tmpLanguages as $lang) {
		$_hreflang[$lang] = rtrim(DOMAIN,'/').'/'.$lang.'/';
	}
}
