<?php
	$section_1 = array(
        	'title' => "Introduction",
               	'content' => "Content",
     	);

	$section_2 = array(
		'title' => "Aerodynamics",
		'sub_sections' =>
			array(
				'sub_section_1' => 
					array(
						'title' => "Forces Acting on an Airplane",
						'content' => ""
					);
				,
				'sub_section_2' => 
					array(
						'title' => "Stability and Control",
                                                'content' => ""
					);
				,
				'sub_section_3' => 
					array(
						'title' => "Aerodynamics of Flight",
                                                'content' => ""
					);
			);			
	);

     	$fp = fopen("/home/david/howlix/docs/yaw2/data/section_1.json", "w");
    	fwrite($fp, json_encode($section_1));
    	fclose($fp);


?>
