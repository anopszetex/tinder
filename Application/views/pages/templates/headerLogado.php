<?php  
	if(!isset($view)) 
		die('404 Forbidden'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bem-vindo(a) <?= $_SESSION['isNome']; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?= base_url_full; ?>css/style.css">
</head>
<body>