<?php  
	if(!isset($view)) 
		die('404 Forbidden'); 
?>
<footer <?php if(isset($_GET['url']) == 'login') echo 'class="fixed"'; ?>>
	<p>Todos os direitos reservados!</p>
</footer>
</body>
</html>