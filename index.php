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

if(!file_exists($pageFile)) {
	printError(404, "Page Not Found :: $page");
}
?>
<!doctype html>

<html lang="en">
<head>
  	<meta charset="utf-8">

  	<title>Quick Framework</title>

	<!-- start: META -->
    <meta name='description' content='Business Resource Management Kit' />
	<meta name='keywords' content='Business, Enterprise, Resource, Planning' />
	<meta name='robots' content='no-follow' />
	<!-- end: META -->

  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" id='viewport-meta'>
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="google" value="notranslate">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta id="win8Icon" name="msapplication-TileImage" content="">
	
	<!-- <link id="favicon" rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link id="icon57" rel="apple-touch-icon" href="./media/logos/icon57.png">
	<link id="icon72" rel="apple-touch-icon" sizes="72x72" href="./media/logos/icon72.png">
	<link id="icon76" rel="apple-touch-icon" sizes="76x76" href="./media/logos/icon76.png">
	<link id="icon114" rel="apple-touch-icon" sizes="114x114" href="./media/logos/icon114.png">
	<link id="icon120" rel="apple-touch-icon" sizes="120x120" href="./media/logos/icon120.png">
	<link id="icon152" rel="apple-touch-icon" sizes="152x152" href="./media/logos/icon152.png">
	<link id="icon167" rel="apple-touch-icon" sizes="167x167" href="./media/logos/icon167.png">
	<link id="icon180" rel="apple-touch-icon" sizes="180x180" href="./media/logos/icon180.png">
	<link id="icon144" rel="icon" type="image/png" sizes="144x144" href="./media/logos/icon144.png"/>
	<link id="icon192" rel="icon" type="image/png" sizes="192x192" href="./media/logos/icon192.png"/> -->
    
    <!-- <link href='https://manage.smartinfologiks.net/misc/themes/default/reset.css' rel='stylesheet' type='text/css' />
    <script src="js/scripts.js"></script> -->

    <link href='bower_components/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css' />

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
  	<?php
  		include_once $pageFile;
  	?>
</body>

</html>
