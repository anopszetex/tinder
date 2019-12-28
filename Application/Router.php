<?php  

	class Router {
		public static $isExecuted = true;
		
		public static function isExecuted() {
			return self::$isExecuted;
		}

		public static function load($path, $arg) {
			$url  = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'home';

			if($url == $path) {
				if(file_exists('Application/views/pages/'.$url.'.php'))
					$arg();
				else
					self::$isExecuted = false;
			} else {
				self::$isExecuted = false;
			}

		}

	}


?>