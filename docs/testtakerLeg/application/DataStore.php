<?php

class DataStore
{
	private $file;

	function __construct($file)
	{
		$this->file = $file;
	}

	public function get()
	{
		if(file_exists($this->file))
		{
			$json = file_get_contents($this->file);
			return $json;
		}
		return false;
	}

	public function set($data)
	{
		if(!file_exists($this->file) && $this->isJson($data))
		{		
			file_put_contents($this->file, $data);
			return true;
		}
		return false;
	}

	public function update($data)
	{
		if(file_exists($this->file) && $this->isJson($data))
		{
			file_put_contents($this->file, $data);		
			return true;
		}
		return false;
	}

	public function delete()
	{
		if(file_exists($this->file))
		{
			unlink($this->file);
			return true;
		}
		return false;
	}

	public function archive($newDir, $fileName)
	{
		if(file_exists($this->file))
		{
			rename($this->file, $dir . $fileName);
			return true;
		}
		return false;
	}
	
	static function isJson($data)
	{
 		json_decode($data);
 		return (json_last_error() == JSON_ERROR_NONE);
	}
}

?>
