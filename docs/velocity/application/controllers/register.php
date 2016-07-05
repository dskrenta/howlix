<?php

class Register extends Controller {
	
	function index()
	{
		$template = $this->loadView('register_view');
		$template->render();
	}
    
}

?>
