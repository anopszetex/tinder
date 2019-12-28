<?php  
	if(!isset($view)) 
		die('404 Forbidden');

	$userData = $arr['data_user'];
?>

<div class="sidebar">
	<div class="topo">
		<h3><?= $userData['nome']; ?> | <a href="<?= base_url; ?>?deslogar">Deslogar</a></h3>
	</div><!--topo-->

	<div class="btn-coord">
		<a href="">Atualizar Coordenadas</a>
	</div><!--btn-coord-->

	<div class="info-localizacao">
		<p>Latitude: 0</p>
		<p>Longitude: 0</p>
		<p>Localização: <?= $userData['localizacao']; ?></p>
	</div><!--info-localizacao-->
</div><!--sidebar-->
