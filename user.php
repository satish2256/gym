<?php
	require_once "object.php";
	if(isset($_POST['signin'])){
		// print_r($_POST);
			$err=[];
		if(isset($_POST['user'])&& !empty($_POST['user']) && trim($_POST['user']) !=''){
				//string length of string
			
				$register->set('user',$_POST['user']);
			
		}else{
			$err['user']="Enter Username";
		}
		if(isset($_POST['password'])&& !empty($_POST['password'])){
				$register->set('password',md5($_POST['password']));
			
		}else{
			$err['password']="Enter a password";
		}
		 print_r($err);
		if(count($err)== 0){
			$message=$register->login();
			 // print_r($message);
		}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Transparent Login Form</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		
		<div class="loginBox">
			<img src="images/user.png" class="user">
			<h2>User login</h2>
			<form action="" method="post">
				<p>UserName</p>
				<input type="text" name="user">
				<span>
				<?php if(isset($err['user'])){
			echo $err['user'];
		}?></span>
				<p>Password</p>
				<input type="password" name="password" >
				<span>
				<?php if(isset($err['password'])){
				echo $err['password'];
		}?></span>
				<input type="submit" name="signin"  value="Sign In">
				<a href="registration.php">Registration form</a>
			</form>
		</div>
	</body>
</html>