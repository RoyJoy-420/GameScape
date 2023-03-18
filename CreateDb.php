<?php
    
class CreateDb
{
    public $hostName ;
    public $userName ;
    public $password;
    public $databaseName;
    public $conn ;
    public $db;
    public $tableName;
    public $columns;


    public function __construct(
        $hostName = "localhost",
        $userName = "root",
        $password = "",
        $databaseName = "test",
        $tableName="testing"
        
    
    )
    {
      $this->databaseName = $databaseName;
      $this->tableName = $tableName;
      $this->hostName = $hostName;
      $this->userName = $userName;
      $this->password = $password;

      // create connection
        
        $this->conn = mysqli_connect($hostName, $userName, $password, $databaseName);
        // Check connection
        if (!$this->conn){
            die("Connection failed : " . mysqli_connect_error());
        }
 
    }

    public function getData(){
        $sql = "SELECT * FROM testing ";
        
        $result = mysqli_query($this->conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

}






