<?php

class Main extends Controller 
{	
	function index()
	{	
		$template = $this->loadView('index_view');
		$model = $this->loadModel('Main_model');

		$template->render();
	}
}

?>
