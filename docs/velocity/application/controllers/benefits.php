<?php

class Benefits extends Controller {
	
	function index()
	{
		$template = $this->loadView('benefits_view');
		$template->render();
	}
    
}

?>
