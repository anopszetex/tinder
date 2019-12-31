<?php  
	namespace controllers;
	use \models\Models;
	use \views\mainView;

	class homeController extends Models{

		function __construct() {
			parent::__construct();
			$this->view = new mainView();
		}

		public function index() {
			if($this->logged() === false)
				$this->redirect(base_url.'login');

			if(isset($_GET['deslogar'])) {
				$this->loggout();
				$this->redirect(base_url);
			}

			if(isset($_GET['action'])) {
				$action = (int)$_GET['action'];
				$userId = (int)$_GET['id'];

				if($action < 0) return;
				if($action > 1) return;

				if($action == 0) {
					$this->like($action, $userId);
				} else if($action == 1) {
					$this->like($action, $userId);
				}
			}

			$this->view->render('home', ['data' => $this], 'headerLogado', null);
		}

		public function login() {
			if($this->logged() === true)
				$this->redirect(base_url);

			if(isset($_POST['action_login'])) {
				$email 	  = $_POST['email'];
				$password = $_POST['password'];

				if($this->checkLogin($email, $password)) {
					$id = $this->getUserId($email);
					$this->startSession($email, $id);
					$this->redirect(base_url);
				} else {
					echo '<script>alert("E-mail ou Senha inválido.");</script>';
				}
			}
			$this->view->render('login');
		}

	}


?>