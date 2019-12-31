<?php  
	if(!isset($view)) 
		die('404 Forbidden');

	$userData = $arr['data']->userData($_SESSION['isUserId']);
	$usuario  = $arr['data']->getUsers();
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

	<div class="info-match">
		<h3>Matches</h3>
		<ul>
		<?php
			$crushs = $arr['data']->crush();
			if(!empty($crushs)) {
				foreach($crushs as $key => $value) {
		?>
				<li>
					<i class="fa fa-heart"></i> <?= $value['nome']; ?>
					<span style="display: none;" class="lat-user"><?= $value['lat']; ?></span>
					<span style="display: none;" class="long-user"><?= $value['longi']; ?></span>
					<span class="user-distance"> Distância: 0</span>
				</li>
			<?php } } else { ?>
				<li class="nomatch">Não há match ainda</li>
			<?php } ?>
		</ul>
	</div><!--info-match-->

</div><!--sidebar-->
<div class="clear"></div><!--clear-->


<section class="box-tinder">
	<?php  
		$i = 0;
		foreach($usuario as $key => $value):
		if($arr['data']->isView($userData['id'], $value['id']))
			continue;
			$i++;
	?>
	<?php if($i == 1): ?>
	<div class="box-usuario-like">
		<div class="box-usuario" style="background: url('<?= $value['imagem']; ?>') center no-repeat; background-size: cover;">
			<div class="info">
				<h2><?= $value['nome']; ?>, <?= $value['idade']; ?></h2>
				<p><?= $value['bio']; ?></p>
			</div>
		</div><!--box-usuario-->
	</div><!--box-usuario-like-->

	<div class="buttons">
	    <a href="?action=0&id=<?= $value['id']; ?>"> 
	    <div class="button no" onClick="animateOnClick('No')">
	      <i class="fa fa-times" aria-hidden="true"></i>
	    </div>
	    </a>
	 	<a href="?action=1&id=<?= $value['id']; ?>">
	    <div class="button yes" onClick="animateOnClick('Yes')">
	      <i class="fa fa-heart" aria-hidden="true"></i>
	    </div>
		</a>
	</div><!--buttons-->
	<?php endif; ?>
	<?php endforeach; ?>
</section><!--box-tinder-->

<script src="<?= base_url_full ?>js/jquery.js"></script>
<script src="<?= base_url_full ?>js/location.js"></script>
