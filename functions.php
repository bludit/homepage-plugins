<?php defined('BLUDIT') or die('BLUDIT');

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
	} else {
		if(!$print){
			return func_get_arg(0);
		}
		print(func_get_arg(0));
	}
}

function buildItem($data, $key) {
	global $currentLanguage;
	global $_topbar;

	$data['translated'] = true;
	$data['key'] = $key;
	$data['screenshoot_twitter_url'] = CDN.'items/'.$data['key'].'/screenshot.png';
	$data['screenshoot_facebook_url'] = CDN.'items/'.$data['key'].'/screenshot.png';
	$data['permalink'] = rtrim($_topbar['website'],'/').'/'.ITEM_TYPE.'/'.$key;
	if (!empty($data['description_'.$currentLanguage])) {
		$data['description'] = $data['description_'.$currentLanguage];
	} else {
		if ($currentLanguage!='en') {
			$data['translated'] = false;
		}
	}

	if (!empty($data['features_'.$currentLanguage])) {
		$data['features'] = $data['features_'.$currentLanguage];
	}

	$data['author'] = getAuthor($data['author_username']);

	// Check Screenshot
	$data['screenshoot_url'] = CDN.'items/'.$data['key'].'/screenshot.png';
	return $data;
}

function buildAuthor($data) {
	return $data;
}

// Returns the items order by date, new to old.
function getItems() {
	$tmp = array();
	$it = new RecursiveDirectoryIterator(PATH_ITEMS);
	foreach (new RecursiveIteratorIterator($it) as $file) {
		if ($file->getExtension()=='json') {
			$json = file_get_contents($file);
			$data = json_decode($json, true);
			$item = buildItem($data, basename(dirname(($file))));
			array_push($tmp, $item);
		}
	}
	// Sort by date
	usort($tmp, "sortByDate");
	return $tmp;
}

function getItem($key) {
	$metadataFile = PATH_ITEMS.$key.DS.'metadata.json';
	if (!file_exists($metadataFile)) {
		return false;
	}

	$json = file_get_contents($metadataFile);
	$data = json_decode($json, true);
	$item = buildItem($data, $key);

	return $item;
}

function getAuthor($username) {
	$metadataFile = PATH_AUTHORS.$username.'.json';
	if (!file_exists($metadataFile)) {
		return false;
	}

	$json = file_get_contents($metadataFile);
	$data = json_decode($json, true);
	$author = buildAuthor($data);

	return $author;
}

function getItemsByAuthor($username) {
	$tmp = array();
	$it = new RecursiveDirectoryIterator(PATH_ITEMS);
	foreach (new RecursiveIteratorIterator($it) as $file) {
		if ($file->getExtension()=='json') {
			$json = file_get_contents($file);
			$data = json_decode($json, true);
			if ($data['author_username']==$username) {
				$item = buildItem($data, basename(dirname(($file))));
				array_push($tmp, $item);
			}
		}
	}
	// Sort by date
	usort($tmp, "sortByDate");
	return $tmp;
}

function sortByDate($a, $b) {
    if ($a['release_date'] == $b['release_date']) {
        return 0;
    }
    return ($a['release_date'] > $b['release_date']) ? -1 : 1;
}

function sanitize($string) {
	if(strpos($string, "plugin/") === 0){
		$string = substr($string, 7);
	}
	$string = str_replace(' ', '-', $string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

function timeago($time){
	$time = time() - $time;

	$tokens = array (
		31536000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);

	foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	}
}
