<?php  
	if(!isset($view)) 
		die('404 Forbidden'); 
?>

<div class="contato principal">
	<div class="center">
		<form method="post">
			<h2>Login</h2>
			<label>E-mail</label>
			<input type="email" name="email" placeholder="seu@email.com" value="teste@teste.com"/>
			<label >Senha</label>
			<input type="password" name="password" value="123456"/>
			<input type="submit" name="action_login" value="Entrar">
		</form>
	</div><!--center-->
</div><!--contato principal-->