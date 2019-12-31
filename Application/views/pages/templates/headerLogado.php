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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>