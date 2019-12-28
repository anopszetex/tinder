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

			$this->view->render('home');
		}

		public function login() {
			if($this->logged() === true)
				$this->redirect(base_url);

			if(isset($_POST['action_login'])) {
				$email 	  = $_POST['email'];
				$password = $_POST['password'];

				if($this->checkLogin($email, $password)) {
					$this->startSession($email, $password);
					$this->redirect(base_url);
				} else {
					echo '<script>alert("Email ou Senha inválido.");</script>';
				}
			}
			$this->view->render('login');
		}

	}


?>