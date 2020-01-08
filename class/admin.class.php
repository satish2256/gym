<?php 
require_once"common.class.php";
	class Admin extends Common{
		protected $id,$name,$username,$password,$email,$last_login,$role,$status;
	
	function login(){
		$sql="select * from tbl_admin where username='$this->username' and password='$this->password' and status=1";
		$conn=new mysqli('localhost','root','','db_project');

		if($conn->connect_errno!=0){
			die('Database connection Error');
		}
		$result=$conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			session_start();
			$_SESSION['admin_username']=$data->username;
			$_SESSION['admin_name']=$data->name;
			$_SESSION['admin_email']=$data->email;
			$_SESSION['admin_role']=$data->role;
			if(isset($_POST['remember'])&& !empty($_POST['remember'])){
				setcookie('username',$username,time()+24*60*60);
			}
			header('location:welcome.php');
		}
		
		else{
			return "Email and password doesnot match";
		}		
	}
		function create(){
			
		 $sql="insert into tbl_admin(name,username,password,email,role,status) values('$this->name','$this->username','$this->password','$this->email','$this->role','$this->status')";
		 return $this->insert($sql);
		}
		
		function lists(){
			$sql="select * from tbl_admin";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from tbl_admin where id='$this->id'";
			return $this->delete($sql);
		}

		function getadmin(){
		$sql="select * from tbl_admin where id='$this->id'";
			return $this->select($sql);
		}
		function edit(){
			 $sql="update tbl_admin set name='$this->name',username='$this->username',password='$this->password',email='$this->email',role='$this->role',status='$this->status' where id='$this->id'";
			return $this->update($sql);
		}
	}
	
 ?>