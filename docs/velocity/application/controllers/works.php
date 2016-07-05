<?php

class Works extends Controller {
	
	function index()
	{
		$template = $this->loadView('works_view');
		$template->render();
	}
    
}

?>
