<?php
	namespace mysql;

	class MySql {

		private $pdo;

		public function connect() {
			if(is_null($this->pdo)) {
				try {
					$this->pdo = new \PDO('mysql:host='.DB['host'].';dbname='.DB['dbname'].';charset=utf8', DB['user'], DB['pass']);
				} catch (\Exception $e) {
					die('<h2>Erro ao conectar</h2>');
				}
			}
			return $this->pdo;
		}

	}


?>