<?php
if(!defined('ROOT')) exit('No direct script access allowed');
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

    <?php
    	if(isset($_ENV['STYLES'])) {
    		foreach ($_ENV['STYLES'] as $key => $value) {
	    		echo "<link href='{$value}' rel='stylesheet' type='text/css' />";
	    	}
    	}
    	if(isset($_ENV['SCRIPTS_PREBODY'])) {
    		foreach ($_ENV['SCRIPTS_PREBODY'] as $key => $value) {
	    		echo "<script src='{$value}'></script>";
	    	}
    	}
    ?>
</head>
<body>
  	<?php
  		echo $htmlBody;
  	?>
  	<?php
  		if(isset($_ENV['SCRIPTS'])) {
    		foreach ($_ENV['SCRIPTS'] as $key => $value) {
	    		echo "<script src='{$value}'></script>";
	    	}
    	}
  	?>
</body>
	<?php
    	if(isset($_ENV['SCRIPTS_POSTBODY'])) {
    		foreach ($_ENV['SCRIPTS_POSTBODY'] as $key => $value) {
	    		echo "<script src='{$value}'></script>";
	    	}
    	}
    ?>
</html>
