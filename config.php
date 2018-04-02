<?php defined('BLUDIT') or die('BLUDIT');
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', __DIR__.DS);
define('PATH_HTML', PATH_ROOT.'html'.DS);
define('PATH_METADATA', PATH_ROOT.'metadata'.DS);
define('PATH_ITEMS', PATH_METADATA.'items'.DS);
define('PATH_AUTHORS', PATH_METADATA.'authors'.DS);
define('CHARSET', 'UTF-8');
define('GOOGLE_ANALYTICS', 'UA-67610404-5');


#define('DOMAIN', 'http://localhost:8000');
#define('CDN', 'http://localhost:8000/metadata/items/');

define('DOMAIN', 'https://plugins.bludit.com');
define('CDN', 'https://rawgit.com/bludit/plugins-repository/master/');

define('SCREENSHOT_DEFAULT', 'https://rawgit.com/bludit/plugins-repository/master/templates/screenshot.png');

define('ITEM_TYPE', 'plugin');
#define('ITEM_TYPE', 'theme');

include('functions.php');
include('boot.php');
