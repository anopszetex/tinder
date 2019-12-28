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

			$this->view->render('home', ['data_user' => $this->userData($_SESSION['isUserId'])], 'headerLogado', null);
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
					echo '<script>alert("Email ou Senha inválido.");</script>';
				}
			}
			$this->view->render('login');
		}

	}


?>