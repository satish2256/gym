<?php 
require_once"common.class.php";
	class Register extends Common{
		protected $id,$username,$firstname,$lastname,$password,$confirm_password,$email,$gender,$status,$created_by,$created_date,$updated_by,$updated_date;
	
	function login(){
		$sql="select * from tbl_regstration where username='$this->user' and password='$this->password' and status=1";
		$conn=new mysqli('localhost','satish','satish','db_project');

		if($conn->connect_errno!=0){
			die('Database connection Error');
		}
		$result=$conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			session_start();
			$_SESSION['register_username']=$data->username;
			header('location:dashboard.php');
		}
		
		else{
			return "Username and password doesnot match";
		}		
	}
		function create(){
			
		$sql="insert into tbl_regstration(username,firstname,lastname,password,confirm_password,email,gender,status,created_by,created_date) values('$this->username','$this->firstname','$this->lastname','$this->password','$this->confirm_password','$this->email','$this->gender','$this->status','$this->created_by','$this->created_date')";
		 return $this->insert($sql);
		}
		
		function lists(){
			$sql="select * from tbl_regstration";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from tbl_regstration where id='$this->id'";
			return $this->delete($sql);
		}

		function getregister(){
		$sql="select * from tbl_regstration where id='$this->id'";
			return $this->select($sql);
		}
		function edit(){
			 $sql="update tbl_regstration set username='$this->username',firstname='$this->firstname'lastname='$this->lastname',password='$this->password',confirm_password='$this->confirm_password',email='$this->email',gender='$this->gender',status='$this->status',updated_date='$this->updated_date',updated_by='$this->updated_by' where id='$this->id'";
			return $this->update($sql);
		}
	}
	
 ?>