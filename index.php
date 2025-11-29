<?php
$url = $_SERVER['REQUEST_URI'];
require_once('workDB.php');
require_once('/home/sky/Документы/Proekti/config.php');
$connect = connectDB(
	$host, 
	$port,
	$dbname, 
	$user,
	$password
	);

$route = '^/$'; 
if (preg_match("#$route#", $url, $params)) {
	$page = include 'view/page/showInfSity.php';
}

$route = '^/page/(?<country>[A-Za-z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
	$page = include 'view/page/showAllSityCountry.php';
}
