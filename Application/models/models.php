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

		public function checkUser($id) {
			$stmt = $this->bd->connect()->prepare('SELECT id FROM usuarios WHERE id = ?');
			$stmt->execute(array($id));
			if($stmt->rowCount() > 0)
				return true;
			else
				return false;
		}

		public function startSession($email, $id) {
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['isLogin']    = $email;
			$_SESSION['isUserId']	= $id;
			$_SESSION['isNome']		= $this->userData($_SESSION['isUserId'])['nome'];
		}

		public function loggout() {
			$_SESSION = array();
			session_unset();
			session_destroy();
		}

		public function getUserId($email) {
			$stmt = $this->bd->connect()->prepare('SELECT id FROM usuarios WHERE email = ?');
			$stmt->execute(array($email));
			return $stmt->fetch()['id'];
		}

		public function userData($id) {
			$stmt = $this->bd->connect()->prepare('SELECT * FROM usuarios WHERE id = ?');
			$stmt->execute(array($id));
			return $stmt->fetch();
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

		public function getUsers() {
			$userData = $this->userData($_SESSION['isUserId']);
			if(strtolower($userData['sexo']) == 'masculino')
				$query = "SELECT * FROM usuarios WHERE sexo != 'masculino' AND localizacao = ? ORDER BY RAND()";
			else
				$query = "SELECT * FROM usuarios WHERE sexo != 'feminino' AND localizacao =  ? ORDER BY RAND()";

			$stmt = $this->bd->connect()->prepare($query);
			$stmt->execute(array($userData['localizacao']));
			return $stmt->fetchAll();
		}

		public function isView($user1, $user2) {
			$stmt = $this->bd->connect()->prepare('SELECT * FROM likes WHERE (user_from = ? AND user_to = ?) OR (user_to = ? AND user_from = ?)');
			$stmt->execute(array($user1, $user2, $user2, $user1));
			if($stmt->rowCount() > 0)
				return true;
			else
				return false;
		}

		public function crush() {
			$crush = [];
			$likes = $this->select('likes', true, 'user_from = ? AND action = 1', array($_SESSION['isUserId']), 'user_to');
			foreach($likes as $key => $value) {
				$theyLikesBack = $this->select('likes', true, 'user_to = ? AND user_from = ? AND action = 1', array($_SESSION['isUserId'], $value['user_to']));
				
				if(count($theyLikesBack) > 0) {
					$infoCrush = $this->select('usuarios', false, 'id = ?', array($value['user_to']));
					$crush[]   = $infoCrush;
				}
			}
			return $crush;
		}

		public function like($action, $usuarioId) {
			$stmt = $this->bd->connect()->prepare('SELECT * FROM likes WHERE user_from = ? AND user_to = ?');
			$stmt->execute(array($_SESSION['isUserId'], $usuarioId));
			if($stmt->rowCount() >= 1) {
				return;
			} else {
				if($this->checkUser($usuarioId) === true) {
					$stmt = $this->bd->connect()->prepare('INSERT INTO likes VALUES (null, ?, ?, ?)');
					$stmt->execute(array($_SESSION['isUserId'], $usuarioId, $action));
					$this->redirect(base_url);
				}
			}

		}

		public function insert($table, $params = []) {
			$column = implode(',', $params);
			$val 	= ':'.implode(': ,', $params);
			$query  = "INSERT INTO `{$table}` {$colunm} VALUES ({$val})";
			foreach($params as $key => $value) {
				$data[':'.$key] = $value;
			}
			$stmt = $this->bd->connect()->prepare($query);
			$stmt->execute($data);
			return $this->bd->connect()->lastInsertId();
		}

		public function select($tabela, $all = false, $query = false, $arr = array(), $tudo = '*') {
			if($query === false) {
				$stmt = $this->bd->connect()->prepare("SELECT $tudo FROM `{$tabela}`");
				$stmt->execute();
			} else {
				$stmt = $this->bd->connect()->prepare("SELECT $tudo FROM `{$tabela}` WHERE {$query}");
				$stmt->execute($arr);
			}
			return (($all === false) ? $stmt->fetch() : $stmt->fetchAll());
		}

		public function delete($table, $idUsuario = false) {
			if(!$idUsuario) {
				$stmt = $this->bd->connect()->prepare("DELETE * FROM `{$table}`");
				$stmt->execute();
			} else {
				$stmt = $this->bd->connect()->prepare("DELETE * FROM `{$table}` WHERE id = ?");
				$stmt->execute(array($idUsuario));
			}
		}

	}	

?>