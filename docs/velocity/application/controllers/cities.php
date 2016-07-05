<?php

class Cities extends Controller {
	
	function index()
	{
		$template = $this->loadView('cities_view');
		$template->render();
	}
    
}

?>
