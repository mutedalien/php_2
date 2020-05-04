<?php

require 'config.php';

class ConnectToDB
{
    private $host   = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbConnect;
    private $limit = 0;
    
    public function __construct() // Метод создания соединения с бд
    {
        if (!isset($this->dbConnect)) {
            try {
               $connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName, $this->dbUser, $this->dbPass); 
               $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $this -> dbConnect = $connect;
            } catch (PDOException $e) {
                die('Ошибка подключения к базе данных: '.$e ->getMessage());
            }
        }
    }
    
    public function getRows($numberRows) 
    {
        static $limit;
        if (isset($_GET['page'])) {
            $limit = $numberRows * $_GET['page'];
        }
        else {
            $limit += $numberRows;
        }
        
        $query = $this -> dbConnect -> prepare("SELECT brand.name as brand, product.name, product.price FROM product LEFT JOIN brand USING (brand_id) LIMIT $limit");
        $query -> execute();
        
        while ($row = $query -> fetchObject()) {
            $data[] = $row;
        }
        return !empty($data)?$data:false;
    }
}