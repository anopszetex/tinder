<?php
	include('../../../../config.php');

	if(!$_SESSION['isLoggedIn'])
		die('404 Forbidden');

	$db = new \mysql\MySql();
	
	$idUsuario = $_SESSION['isUserId'];
	$latitude  = $_POST['latitude'];
	$longitude = $_POST['longitude'];

	$update = $db->connect()->prepare("UPDATE usuarios SET lat = ?, longi = ? WHERE id = ?");
	$update->execute(array($latitude, $longitude, $idUsuario));
?>