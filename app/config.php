<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$_ENV['STYLES'] = [
	"bower_components/bootstrap/dist/css/bootstrap.min.css",

];

$_ENV['SCRIPTS'] = [];
$_ENV['SCRIPTS_PREBODY'] = [
	"bower_components/jquery/dist/jquery.min.js",
	"bower_components/bootstrap/dist/js/bootstrap.min.js"
];
$_ENV['SCRIPTS_POSTBODY'] = [];
?>
