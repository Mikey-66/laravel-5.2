<?php

class dbLink{
    
    private static $link;
    
    private static $instance;

    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '123456';
//    private $port = '3306';
    private $dbName = "laravel5";



    private function __construct(){
        
    }
    
    public function setDb($dbName){
        $this->dbName = $dbName;
    }

    public function connect(){
        @self::$link = mysql_connect($this->host, $this->username, $this->password)  
                or die('db connection error : ' . mysql_error());
        
        mysql_select_db($this->dbName) or die('db seclect error : ' . mysql_error());
        
        mysql_set_charset('utf8');
    }
    
    public function getLink(){
        if (!isset(self::$link)){
            $this->connect();
        }
        
        return self::$link;
    }

    public static function getInstance(){
        if (isset(self::$instance)){
            return self::$instance;
        }else{
            self::$instance = new self();
            return self::$instance;
        }
    }
}

