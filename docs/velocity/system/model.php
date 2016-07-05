<?php

class Model {

    private $_mysql_db,
            $_mongo_db;
            
    public function __construct()
    {
        global $config;

        // MySQL *persistent* db connection
        try {
            $this->_mysql_db = new PDO("mysql:host={$config['mysql_db_host']};dbname={$config['mysql_db_name']}", $config['mysql_db_username'], $config['mysql_db_password'], array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            die("MySQL Error: " . $e->getMessage());
        }

        // MongoDb db connection. Has to be two steps. Persistent by default.
        $mongoConnection = new MongoClient();
        $this->_mongo_db = $mongoConnection->$config['mongo_db_name'];
    }

    public function escapeString($string)
    {
	return mysqli_real_escape_string($string);
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
	
    public function sql_execute($qry)
    {
    	if ($exec = $this->_mysql_db->query($qry)) {
            return $exec;
        }
	    return false; // on failure
    }
    
    public function sql_prep_query($qry, $params = array())
    {
        if ($stmt = $this->_mysql_db->prepare($qry)) {
            if (!empty($params)) {
                $stat = $stmt->execute($params);
                if ($stmt->rowCount() > 0) {
                    $results = array();
                    while ($result = $stmt->fetchObject()) {
                        $results[] = $result;
                    }
                    return $results;
                }
                return $stat;
            }
        }
    }
    
    /* MongoDB functions ---------------------------------------------------------------------- */

	// Not completed 
}
?>
