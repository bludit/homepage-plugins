<?php
define('BLUDIT', true);
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', __DIR__.DS);
define('PATH_PHP', PATH_ROOT.'php'.DS);
define('PATH_METADATA', PATH_ROOT.'metadata'.DS);
define('CHARSET', 'UTF-8');
define('DOMAIN', 'http://localhost:8000');
#define('DOMAIN', 'https://plugins.bludit.com');
define('CDN', 'http://localhost:8000/metadata/');
#define('CDN', 'https://rawgit.com/bludit/plugins-repository/master/');

// Returns the translation of the key
function l($key, $print=true) {
	global $languageArray;
	$key = mb_strtolower($key, CHARSET);
	$key = str_replace(' ','-',$key);
	if (isset($languageArray[$key])) {
		if ($print) {
			echo $languageArray[$key];
		} else {
			return $languageArray[$key];
		}
	}
}

function buildItem($data, $filename) {
	global $currentLanguage;
	global $_topbar;

	$data['filename'] = $filename;
	$data['screenshoot_url'] = CDN.$data['filename'].'/screenshot800x600.png';
	$data['screenshoot_twitter_url'] = CDN.$data['filename'].'/screenshot800x600.png';
	$data['screenshoot_facebook_url'] = CDN.$data['filename'].'/screenshot800x600.png';
	$data['permalink'] = $_topbar['website'].'/plugin/'.$filename;
	if (isset($data['description_'.$currentLanguage])) {
		$data['description'] = $data['description_'.$currentLanguage];
	}
	if (isset($data['features_'.$currentLanguage])) {
		$data['features'] = $data['features_'.$currentLanguage];
	}
	return $data;
}

// Returns the items order by date, new to old.
function getItems() {
	$tmp = array();
	$it = new RecursiveDirectoryIterator(PATH_METADATA);
	foreach (new RecursiveIteratorIterator($it) as $file) {
		if ($file->getExtension()=='json') {
			$json = file_get_contents($file);
			$data = json_decode($json, true);
			$item = buildItem($data, pathinfo($file, PATHINFO_FILENAME));
			array_push($tmp, $item);
		}
	}
	// Sort by date
	usort($tmp, "sortByDate");
	return $tmp;
}

function getItem($filename) {
	$metadataFile = PATH_METADATA.$filename.DS.'metadata.json';

	if (!file_exists($metadataFile)) {
		return false;
	}

	$json = file_get_contents($metadataFile);
	$data = json_decode($json, true);
	$item = buildItem($data, $filename);

	return $item;
}

function sortByDate($a, $b) {
    if ($a['release_date'] == $b['release_date']) {
        return 0;
    }
    return ($a['release_date'] > $b['release_date']) ? -1 : 1;
}

function sanitize($string) {
	$string = str_replace(' ', '-', $string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

// Language passed via $_GET['l']
$currentLanguage = 'en';
$acceptedLanguages = array('en', 'de', 'es');
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
		'documentation'=>'https://docs.bludit.com/'.$currentLanguage.'/',
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

if (!empty($_GET['item'])) {
	$itemName = sanitize($_GET['item']);
	$_item = getItem($itemName);
	$_whereAmI = 'item';
	if ($_item===false) {
		header("HTTP/1.0 404 Not Found");
		exit;
	}
} else {
	$_items = getItems();
	$_whereAmI = 'home';
}
