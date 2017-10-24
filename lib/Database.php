<?php

class Database{

		public $dbhost = "localhost";
		public $dbuser = "root";
		public $dbpass = "";
		public $dbname = "loginsystem";

		public $link;
		public $error;


public function __construct(){
		 $this->connectDB();
		}

//Create Database connection
	public function connectDB(){
		$this->link = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
		if(!$this->link){
			$this->error ="Connection Failed".$this->link->connect_error;
			return false;
		}
	}

//Read Data From Database;
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else{
			return false;
		}
	}

//Create Data to Database
	public function create($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			header("Location: signup.php?msg=".urlencode("Data Inserted Successfully!!!"));
			exit();
		} else{
			die("Error: (".$this->link->errno.")".$this->link->error);
		}
	}

}