<?php
//Central file, all requests are routed through this file

define("ROOT",__DIR__ . '/');

if(!is_dir(ROOT."tmp/") || !is_writable(ROOT."tmp/")) {
	echo "<h1>TMP folder does not exist or is not writable</h1>";
	exit();
}

ini_set('display_errors', 'On');
error_reporting(-1);

include_once "api/bootstrap.php";
include_once "app/config.php";

define('PAGE_URI',current(explode("?", str_replace(ROOT, '', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']))));
define('PAGE_NAME',current(explode("/", PAGE_URI)));

echo PAGE_NAME;
?>