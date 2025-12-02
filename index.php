<?php
$url = $_SERVER['REQUEST_URI'];
require_once('workDB.php');
require_once('functions.php');
require_once('/home/sky/Документы/Proekti/config.php');
$connect = connectDB(
	$host, 
	$port,
	$dbname, 
	$user,
	$password
	);

// переход ко всем категориям
$route = '^/$'; 
if (preg_match("#$route#", $url, $params)) {
	$data = include 'scripts/allCategories.php';
}

// переход ко всем объявлениям в категории
$route = '^/(?<category>[A-Za-z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
	$data = include 'scripts/allAnnonInCat.php';
}

// переход ко всем объявлениям в категории
$route = '^/(?<category>[A-Za-z0-9_-]+)/(?<announc>[A-Za-z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
	$data = include 'scripts/allAnnonInCat.php';
}

// добавление нового объявления
$route = '^/new_announc$';
if (preg_match("#$route#", $url, $params)) {
	$select = selectCategories($connect);
	$layout = changeView('view/newAnnounc.html',$select);
	echo ($layout);
}

// проверка на массив
if(is_array($data)){
	// Преобразование в JSON
	$json = json_encode($data);

	echo ($json);
}

