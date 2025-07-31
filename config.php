<?php defined('BLUDIT') or die('BLUDIT');
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', __DIR__.DS);
define('PATH_HTML', PATH_ROOT.'html'.DS);
define('PATH_METADATA', PATH_ROOT.'metadata'.DS);
define('PATH_ITEMS', PATH_METADATA.'items'.DS);
define('PATH_AUTHORS', PATH_METADATA.'authors'.DS);
define('CHARSET', 'UTF-8');
define('VERSION', '1.0');

// define('DOMAIN', 'http://localhost:7000');
// define('CDN', 'http://localhost:7000/metadata/items/');

define('DOMAIN', 'https://plugins.bludit.com');
define('CDN', 'https://raw.githubusercontent.com/bludit/plugins-repository/master/');

define('SCREENSHOT_DEFAULT', 'https://raw.githubusercontent.com/bludit/plugins-repository/master/templates/screenshot.png');

define('ITEM_TYPE', 'plugin');
#define('ITEM_TYPE', 'theme');

include('functions.php');
include('boot.php');
