<?php

class Main_model extends Model  
{
        public function grabList() 
        {
		$path = "/home/david/howlix/docs/rockydemo/list/";
		$data = array();
		$files = scandir($path);

		for($i = 0; $i < count($files); $i++)
		{
			$point = $path . $files[$i];
			$data[$i] = json_decode(file_get_contents($point), true);
		}		
		
		return array_values(array_filter($data));		

		/* 
                $path = "/home/david/howlix/docs/rockydemo/list/"; 
                $filename = "list.json"; 
 
                if(file_exists($filename)) 
                { 
                        return json_decode(file_get_contents($filename), true);  
                } 
                else 
                { 
                        return false; 
                } 
		*/
        }

	public function grabExpert($id)
	{
		$path = "/home/david/howlix/docs/rockydemo/list/";
		$file = $path . $id . ".json";

		if(file_exists($file))
		{
			return json_decode(file_get_contents($file), true);
		}
		else
		{
			return false;
		}
	}

	public function addExpert($id, $name, $subject, $email, $phone, $price)
	{
		$expert = array(
			'id' => trim($id), 
                        'name' => trim($name), 
                        'subject' => trim($subject), 
			'email' => trim($email),
			'phone' => trim($phone),
                        'price' => trim($price) 
                ); 
 
                $fp = fopen("/home/david/howlix/docs/rockydemo/list/$id.json", "w"); 
                fwrite($fp, json_encode($expert)); 
                fclose($fp); 
 
                return true;
	} 
}

?> 
      

