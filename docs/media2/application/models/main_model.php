<?php

class Main_model extends Model 
{
	
	public function loadMedia($limit)
	{
		$limit = $this->escapeString($limit);
		$result = $this->query("SELECT * FROM media2 ORDER BY ID DESC LIMIT $limit");
		return $result;
	}

}

?>
