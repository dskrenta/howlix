<?php

class Demo extends Controller 
{	
	function index()
	{	
		$template = $this->loadView('demo_view');
		$model = $this->loadModel('Main_model');

		$template->render();
	}

	function section_2()
	{
		$template = $this->loadView('section_2_view');
		$template->render();
	}
}

?>
