<?php 
	include('config.php');
	
	$homeController = new \controllers\homeController();
	
	Router::load('home', function() use ($homeController) {
		$homeController->index();
	});

	Router::load('login', function() use ($homeController) {
		$homeController->login();
	});

	if(Router::isExecuted() === false)
		die('Página não encontrada :(');

?>