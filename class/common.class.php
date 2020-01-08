<?php 
abstract class Common{
		protected $conn;
		function set($var,$value){
		$this->$var=$value;

	}
	function get($var){
		return $this->$var;
	}
	function connect(){
		 $this->conn= new mysqli('localhost','root','','db_project');
		 if($this->conn->connect_errno !=0){
		 	die("Database Connection Error");
		 }
	}
	function insert($sql){
		$this->connect();
		$this->conn->query($sql);
		if ($this->conn->insert_id >0 && $this->conn->affected_rows >0) {
			return $this->conn->insert_id;
		}else{
			return false;
		}
	}
	function select($sql){
		$this->connect();
		$result = $this->conn->query($sql);
		$data = [];
		while ($d=$result->fetch_object()) {
			array_push($data, $d);
		}
		return $data;
	}
	function delete($sql){
		$this->connect();
		$this->conn->query($sql);
		if ($this->conn->affected_rows >0) {
			return true;
		}else{
			return false;
		}
	}
	function update($sql){
		$this->connect();
		$this->conn->query($sql);
		if ($this->conn->affected_rows >0) {
			return true;
		}else{
			return false;
		}
	}
	}


 ?>