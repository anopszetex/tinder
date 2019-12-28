<?php  
	namespace views;

	class mainView {
		
		public function render($fileName, $arr = [], $header = 'header', $footer = 'footer') {
			$view = true;
			if(!empty($header))
				include('Application/views/pages/templates/'.$header.'.php');
				include('Application/views/pages/'.$fileName.'.php');
			if(!empty($footer))
				include('Application/views/pages/templates/'.$footer.'.php');
				die();
		}

	}


?>