<?php

class Register extends Controller {
	
	function index()
	{
		$template = $this->loadView('login_view');
		$template->render();
	}
    
}

?>
