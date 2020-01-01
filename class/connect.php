<?php
class dbConnection{
	
	private $host 		= "localhost";
	private $dbname     = "oopbold_db";
	private $username	= "root";
	private $pass		= "";
	public  $dbconnect   = "";
   

	protected function __construct(){

		

		$this->dbconnect = mysqli_connect($this->host,
										  $this->username,
										  $this->pass,
										  $this->dbname);
                               
		if($this->dbconnect){
			return $this->dbconnect;
		}
		else{
			return "Error connecting to DB ". mysqli_error();
		}

	
	}




}



?>