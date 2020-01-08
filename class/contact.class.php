<?php 
require_once"common.class.php";
	class Contact extends Common{
		protected $id,$name,$email,$phone,$message;
	
	function create(){
		// print_r($this);
		  $sql="insert into tbl_contact(name,email,phone,message,status)values('$this->name','$this->email','$this->phone','$this->message','$this->status')";
		return $this->insert($sql);
	}
		function lists(){
			$sql="select * from tbl_contact";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from tbl_contact where id='$this->id'";
			return $this->delete($sql);
		}

		function getcontact(){
		$sql="select * from tbl_contact where id='$this->id'";
			return $this->select($sql);
		}
		function getContactForSelect(){
		$sql="select id,name from tbl_contact";
		return $this->select($sql);
	}
}
	
 ?>