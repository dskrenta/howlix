<?php

class Faq extends Controller {
	
	function index()
	{
		$template = $this->loadView('faq_view');
		$template->render();
	}
    
}

?>
