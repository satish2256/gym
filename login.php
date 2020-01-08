<?php
	require_once "object.php";
	if(isset($_POST['signin'])){
	// print_r($_POST);
			$err=[];
		if(isset($_POST['user'])&& !empty($_POST['user']) && trim($_POST['user']) !=''){
				//string length of string
			if(strlen($_POST['user'])< 4 ){
				$err['user']="username must be 4 character";
			}else{
				$admin->set('username',$_POST['user']);
			}
		}else{	
			$err['user']="Enter Username";
		}
		if(isset($_POST['password'])&& !empty($_POST['password'])){
			$admin->set('password',md5($_POST['password']));
		}else{
			$err['password']="Enter a password";
		}
		 print_r($err);
		if(count($err)== 0){
			$message=$admin->login();
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
			<h2>Admin login</h2>
			<form action="" method="post" id="admin_form" novalidate="">
				<label>UserName</label>
				<input type="text" name="user" required="">
				<span>
				<?php if(isset($err['user'])){
			echo $err['user'];
		}?></span>
				<label>Password</label>
				<input type="password" name="password" required="" >
				<span>
				<?php if(isset($err['password'])){
				echo $err['password'];
		}?></span>
				<input type="checkbox" name="remember" id="remember">Remember me
				<input type="submit" name="signin"  value="Sign In">
			</form>
		</div>
		<script src="../js/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="validation/dist/validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#admin_form').validate();
            // console.log('hello');
        });
    </script>

	</body>
</html>