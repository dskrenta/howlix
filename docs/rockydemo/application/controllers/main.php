<?php

class Main extends Controller 
{	
	function index()
	{	
		$template = $this->loadView('index_view');
		$model = $this->loadModel('Main_model');
	
		$template->set('list', $model->grabList());

		$template->render();
	}

	function addExpert()
	{
                $model = $this->loadModel('Main_model');
		$helper = $this->loadHelper('Id_helper');

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$template = $this->loadView('expert_added_view');
			
			$id = $helper->generate_id();

			$model->addExpert($id, $_POST['name'], $_POST['subject'], $_POST['email'], $_POST['phone'], $_POST['price']);

			$template->render();	
		}
		else
		{
			$template = $this->loadView('add_expert_view');
			$template->render();
		}
	}

	function requestExpert()
	{
                $model = $this->loadModel('Main_model');

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			$template = $this->loadView('confirm_expert_view');
			$template->render();
		}
		else
		{
			$id = $_GET['id'];

			$template = $this->loadView('request_expert_view');
			$template->set('id', $id);
			$template->render();
		}
	}
}

?>
