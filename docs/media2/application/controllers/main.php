<?php

class Main extends Controller {
	
	function index()
	{
		$loadModel = $this->loadModel('Main_model');
		$loadMedia = $loadModel->loadMedia(10);

		$template = $this->loadView('main_view');
		$template->set('loadMedia', $loadMedia);
		$template->render();
	}

}

?>
