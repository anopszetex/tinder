<?php  
	namespace models;
	use \mysql\MySql;

	class Models {
		
		private $view;
		private $bd;

		function __construct() {
			$this->bd = new MySql();
		}

		public function checkLogin($email, $password) {
			$email = $this->checkInput($email);
			$pass  = $this->checkInput($password);
			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
				if(strlen($email) <= 60 && strlen($password) <= 60) {
					$query = <<< EOT
					SELECT email, senha FROM usuarios WHERE email = ? AND senha = ?
					EOT;
					$stmt = $this->bd->connect()->prepare($query);
					$stmt->execute(array($email, md5($pass)));
					if($stmt->rowCount() == 1)
						return true;
						return false;
				}
			}
		}

		public function startSession($email, $password) {
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['isLogin']    = $email;
			$_SESSION['isPassword'] = $password;
		}

		public function logged() {
			return isset($_SESSION['isLoggedIn']) ? true : false;
		}

		public function redirect($url) {
			echo '<script>location.href = "'.$url.'"</script>';
			die();
		}

		public function checkInput($var) {
			return htmlspecialchars(trim(stripcslashes($var)));
		}

	}	

?>