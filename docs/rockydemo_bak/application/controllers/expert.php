<?php

class Expert extends Controller 
{	
	function index()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$template = $this->loadView('requested_expert_view');
			$model = $this->loadModel('Main_model');
			$helper = $this->loadHelper('Email_helper');

			$helper->send_email($_POST['name'], $_POST['message'], $_POST['email'], $_POST['to_email']);
	
			$template->render();
		}
		else
		{	
			$template = $this->loadView('expert_view');
			$model = $this->loadModel('Main_model');	

			$template->set('expert', $model->grabExpert($_GET['id']));
	
			$template->render();
		}
	}
}

?>
