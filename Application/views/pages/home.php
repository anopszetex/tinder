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
		<button onClick="getLocation()">Atualizar Coordenadas</button>
	</div><!--btn-coord-->

	<div class="info-localizacao">
		<?php  
			$lat  = (!empty($userData['lat']))   ? $userData['lat']   : 0;
			$long = (!empty($userData['longi'])) ? $userData['longi'] : 0;
		?>
		<p class="lat-text">Latitude: <?= $lat; ?></p>
		<p class="long-text">Longitude: <?= $long; ?></p>
		<p>Localização: <?= $userData['localizacao']; ?></p>
	</div><!--info-localizacao-->
</div><!--sidebar-->

<script src="<?= base_url_full ?>js/jquery.js"></script>
<script src="<?= base_url_full ?>js/location.js"></script>
