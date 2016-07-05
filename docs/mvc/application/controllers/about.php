<?php

class About extends Controller {
	
	function index()
	{
		$template = $this->loadView('about_view');
		$template->render();
	}

}

?>
