<?php
//Central file, all requests are routed through this file

define("ROOT",__DIR__ . '/');

if(!is_dir(ROOT."tmp/") || !is_writable(ROOT."tmp/")) {
	echo "<h1>TMP folder does not exist or is not writable</h1>";
	exit();
}

ini_set('display_errors', 'On');
// error_reporting(-1);
error_reporting(E_ALL);

include_once "api/bootstrap.php";
include_once "app/config.php";


define('PAGE_URI',current(explode("?", str_replace(ROOT, '', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']))));

$page = current(explode("/", PAGE_URI));
if($page==null || strlen($page)<=0) $page = "home";

define('PAGE_NAME',$page);

$pageFile = ROOT."app/pages/{$page}.php";
$layoutFile = ROOT."app/layouts/default.php";

if(!file_exists($pageFile)) {
	printError(404, "Page Not Found :: $page");
}
if(!file_exists($layoutFile)) {
	printError(404, "Layout not supported");
}

ob_start();
include_once $pageFile;
$htmlBody = ob_get_contents();
ob_clean();

include_once $layoutFile;
?>
