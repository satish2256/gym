<?php 
 $title="create_registration";
 require_once"object.php";
 session_start();
if(isset($_POST['btnSave'])){
    $err=[];
    if(isset($_POST['username'])&& !empty($_POST['username']) && trim($_POST['username'])!=''){
      $username=$_POST['username'];
    }else{
      $err['username']="Enter a Username";
    }
    if(isset($_POST['firstname'])&& !empty($_POST['firstname'])&& trim($_POST['firstname'])!=''){
      $firstname=$_POST['firstname'];
    }else{
      $err['firstname']="Enter a Firstname";
    }
    if(isset($_POST['lastname'])&& !empty($_POST['lastname'])&& trim($_POST['lastname'])!=''){
      $lastname=$_POST['lastname'];
    }else{
      $err['lastname']="Enter Lastname";
    }
    if(isset($_POST['password'])&& !empty($_POST['password']) && trim($_POST['password'])!=''){
      $register->set('password',md5($_POST['password']));
    }else{
      $err['password']="Enter Password";
    }
    if(isset($_POST['confirm_password'])&& !empty($_POST['confirm_password'])&& trim($_POST['confirm_password'])!=''){
      $confirm_password=$_POST['confirm_password'];
    }else{
      $err['confirm_password']="Enter Confirm Password";
    }
    if(isset($_POST['email'])&& !empty($_POST['email'])&& trim($_POST['email'])!=''){
      $email=$_POST['email'];
    }else{
      $err['email']="Enter Email";
    }
    if(isset($_POST['gender'])&& !empty($_POST['gender'])&& trim($_POST['gender'])!=''){
    $register->set('gender',$_POST['gender']);

    }else{
      $err['gender']="Select a Gender";
    }
    if (isset($_POST['status']) && !empty($_POST['status'])&& trim($_POST['status'])!='') {
    $register->set('status',$_POST['status']);
    }else{
    $err['status']='select Status';
    }
            $register->set('username',$_POST['username']);
            $register->set('firstname',$_POST['firstname']);
            $register->set('lastname',$_POST['lastname']);
            $register->set('password',md5($_POST['password']));
            $register->set('confirm_password',$_POST['confirm_password']);
            $register->set('email',$_POST['email']);
            if(count($err)==0){
            $status=$register->create();
          }
        }
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
    <link rel="stylesheet" type="text/css" href="css/index1.css">
</head>
<body>
  <h1>Registration Form</h1>
  <form name="" method="post" action="">
  <table border="0" width="500" align="center" class="demo-table">
    <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Registered Sucess</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Registered failed</div>
                    <?php }else{ ?>
                    <?php } ?>
    <tr>
      <td>User Name</td>
      <td><input type="text" class="demoInputBox" name="username">
           <?php if(isset($err['username'])){
      echo $err['username'];
    }?>
  </td>
    </tr>
    <tr>
      <td>First Name</td>
      <td><input type="text" class="demoInputBox" name="firstname">
           <?php if(isset($err['firstname'])){
      echo $err['firstname'];
    }?>
  </td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input type="text" class="demoInputBox" name="lastname">
           <?php if(isset($err['lastname'])){
      echo $err['lastname'];
    }?>
  </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" class="demoInputBox" name="password">
              <?php if(isset($err['password'])){
      echo $err['password'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="password" class="demoInputBox" name="confirm_password" value="">
               <?php if(isset($err['confirm_password'])){
      echo $err['confirm_password'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email">
           <?php if(isset($err['email'])){
      echo $err['email'];
    }?>
  </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" value="M"> Male
       <input type="radio" name="gender" value="F"> Female
               <?php if(isset($err['gender'])){
                 echo $err['gender'];
    }?>
      </td>
    </tr>
     <tr>
      <td>Status</td>
      <td><input type="radio" name="status" value="1"> Active
      <input type="radio" name="status" value="0"> Deactive
           <?php if(isset($err['status'])){
      echo $err['status'];
        }?>
      </td>
    </tr>
    <tr>
      <td colspan=2>
      <input type="checkbox" name="terms"> I accept Terms and Conditions
      <br>
       <input type="submit" name="btnSave" value="Register" class="btnSave">
       <input type="submit" name="btnSave" value="Cancle" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

