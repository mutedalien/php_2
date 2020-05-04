<?php

class PdoM
{
    private static $instance;
    private $db; 
	
    public static function Instance()
    {
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct()
    {
    	setlocale(LC_ALL, 'ru_RU.UTF8');	
    	$this -> db = new PDO(DB_DRIVER.':host=' .DB_SERVER . ';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    	$this -> db -> exec('SET NAMES UTF8');
    	$this -> db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    
    public function Select($table, $where_key = false, $where_value = false, $fetchAll = false) 
    {
        
        if ($where_key AND $where_value) {
            $query = "SELECT * FROM " . $table . " WHERE " . $where_key . " = " . "'$where_value'";
// echo '<pre> Select:';
// var_dump($query);
// echo '</pre>';
        } else {
            $query = "SELECT * FROM " . $table;
        }
        
        $query = $this->db->prepare($query);
        $query -> execute();
        
        if ($query->errorCode() != PDO::ERR_NONE) {
            $info = $query->errorInfo();
            die($info[2]); 
        }
        
        if ($fetchAll) {
            return $query->fetchAll();
        } elseif ($where_key AND $where_value) {
            return $query->fetch();
        } else {
            return $query->fetchAll();
        }
    }

    public function MyQuery($query, $fetchAll = true)
    {
        $query = $this->db->prepare($query);
//echo '<pre>PdoM->MyQuery()=$query:';
//print_r($query);
//echo '</pre>';
        $query -> execute();
        
        if ($query->errorCode() != PDO::ERR_NONE) {
            $info = $query->errorInfo();
            die($info[2]);
        }
        
        if ($fetchAll) {
            return $query -> fetchAll();
        } else {
            return $query->fetch();
        }
    }

    public function Insert($table, $object)
    {
    	$columns = array();
    		
    	foreach ($object as $key => $value) {
    	    $columns[] = $key;
            $masks[] = "'$value'";

            if ($value === null) {
                $object[$key] = 'NULL';
            }
    	}
    		
    	$columns_s = implode(',', $columns);
    	$masks_s = implode(',', $masks);
    		
    	$query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
        //print_r($query);
    	$query = $this -> db -> prepare($query);
    	$query->execute($object);
    		
    	if ($query -> errorCode() != PDO::ERR_NONE) {
    	    $info = $query -> errorInfo();
            die($info[2]); 
    	}
    		
    	return $this -> db -> lastInsertId();		
    }
	
    public function Update($table, $object, $where)
    {
    	$sets = array();
    		 
    	foreach($object as $key => $value) {
    			
    	    $sets[] = "$key='$value'";
                                                    
    	    if($value === NULL){
    		    $object[$key]='NULL';
    	    }
    	}
    		 
    	$sets_s = implode(',',$sets);
    	$query = "UPDATE $table SET $sets_s WHERE $where";
            //echo "<pre>"; 
            //var_dump($query); 
            // echo "</pre>"; 
    	$q = $this -> db -> prepare($query);
    	$q -> execute($object);
     
    	if($q->errorCode() != PDO::ERR_NONE) {
    	    $info = $q->errorInfo();
    	    die($info[2]);  
    	}
    		
    	return $q->rowCount();
    }
	
    public function Delete($table, $where)
    {
    	$query = "DELETE FROM $table WHERE $where";
    	$q = $this -> db -> prepare($query);
    	$q -> execute();
    		
    	if($q->errorCode() != PDO::ERR_NONE){
                $info = $q -> errorInfo();
                die($info[2]); // Возвращает текст ошибки.
    	}
    		
    	return $q->rowCount();
    }
}