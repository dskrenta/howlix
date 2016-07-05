<?php

class Model {

    private $_mysql_db,
            $_mongo_db;
            
    public function __construct()
    {
        global $config;

/*
        // MySQL *persistent* db connection
        try {
            $this->_mysql_db = new PDO("mysql:host={$config['mysql_db_host']};dbname={$config['mysql_db_name']}", $config['mysql_db_username'], $config['mysql_db_password'], array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            die("MySQL Error: " . $e->getMessage());
        }

        // MongoDb db connection. Has to be two steps. Persistent by default.
        //$mongoConnection = new MongoClient();
        //$this->_mongo_db = $mongoConnection->$config['mongo_db_name'];
*/

	$this->_mysql_db = mysqli_connect("localhost","fundb","fundba838","fundb");

    }

    public function escapeString($string)
    {
	//return mysqli_real_escape_string($string);
    	return $this->_mysql_db->real_escape_string($string);
    }

    public function escapeArray($array)
    {
        array_walk_recursive($array, create_function('&$v', '$v = mysqli_real_escape_string($v);'));
	return $array;
    }
	
    public function to_bool($val)
    {
        return !!$val;
    }
	
    public function to_date($val)
    {
        return date('Y-m-d', $val);
    }
	
    public function to_time($val)
    {
        return date('H:i:s', $val);
    }
	
    public function to_datetime($val)
    {
        return date('Y-m-d H:i:s', $val);
    }
	
    public function sql_query($qry)
    {
    	if ($result = $this->_mysql_db->query($qry)) {
            $resultObjects = array();
            while($row = $result->fetchObject()) $resultObjects[] = $row;

       	    return $resultObjects;
        }
        return false; // on failure
    }

	public function regular_sql_query($qry)
	{
		if($result = $this->_mysql_db->query($qry))
		{
			return true;
		}
		return false;
	}

    public function sql_check_instances($qry)
    {
	$result = $this->mysql_db->query($qry);
	if(mysqli_num_rows($result)>=1)
	{
		return true;
	}
	return false;
	
	/*
	$sql=mysql_query("SELECT FROM users (username, password, email) WHERE username=$fusername");
 	if(mysql_num_rows($sql)>=1)
   	{
    		echo"name already exists";
  	}
 	else
    	{
   		//insert query goes here
    	}
	*/
    }
	
    public function sql_execute($qry)
    {
    	if ($exec = $this->_mysql_db->query($qry)) 
	{
            return $exec;
        }
	else
	{
	    return false; // on failure
   	} 
   }

	/*
	public function sql_num_rows($qry)
	{
		if($stmt = $this->_mysql_db->prepare($qry))
		{
			$stmt->execute();
			if($stmt->num_rows > 0)
			{
				return true;
			}
			return false;
		}
	}
	*/

    
    //public function sql_prep_query($qry, $params = array())
   
	public function sql_prep_query($qry)
    	{
    		if ($stmt = $this->_mysql_db->prepare($qry)) 
		{
        		if (!empty($qry)) 
			{
                		//$stat = $stmt->execute($params);
                		$stat = $stmt->execute();
				if ($stmt->num_rows > 0) 
				{
                    			$results = array();
                    			while ($result = $stmt->fetchObject()) 
					{
                        			$results[] = $result;
                    			}

                    			if ($results) 
					{
                        			return $results;
                    			}   
                    
					return $stat;
                		}
                		
				return $stat;
            		}
        	}
    	}
	
    
    /* MongoDB functions ---------------------------------------------------------------------- */

	// Not completed 

	// if collection does not exist mongo creates it 
	/*
	public function select_collection($collection_name)
	{
		$collection = $config['mongo_db_name']->$collection_name;
	}
	
	
	public function create_document($collection_name, $document_name, $content)
	{
		$document = array(
        		'title'     => $document_name,
        		'content'   => $content,
        		'saved_at'  => new MongoDate() 
    		);
    		$collection_name->insert($document);
	}

	public function read_document($id)
	{
    		$results = $posts::findOne(array('_id' => new MongoId($id)));
		return $results;
	}

	public function update_document($id, $set, $content)
	{
    		$posts->update(
        		array('_id'     => new MongoId($id)),
    			array('$set'    => $content)
    		);
	}

	public function delete_document()
	{

	} 
	*/ 
    
}
?>
