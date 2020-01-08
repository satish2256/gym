<?php 
 $title="create_admin";
include_once "header.php";
if(isset($_POST['btnSave'])){
    $err=[];
    if(isset($_POST['name'])&& !empty($_POST['name']) && trim($_POST['name'])!=''){
      $name=$_POST['name'];
    }else{
      $err['name']="Enter a Name";
    }
    if(isset($_POST['username'])&& !empty($_POST['username'])&& trim($_POST['username'])!=''){
      $username=$_POST['username'];
    }else{
      $err['username']="Enter a UserName";
    }
    if(isset($_POST['email'])&&!empty($_POST['email'])&&trim($_POST['email'])!=''){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                    $admin->set('email',$_POST['email']);
                }else{
                    $err['email']='Invalid Email';
                }

            }else{
                $err['email']="Enter email";
            }
    if(isset($_POST['password'])&& !empty($_POST['password']) && trim($_POST['password'])!=''){
      $password=$_POST['password'];
    }else{
      $err['password']="Enter Password";
    }
    if(isset($_POST['role'])&& !empty($_POST['role'])&& trim($_POST['role'])!=''){
      $admin->set('role',$_POST['role']);
    }else{
      $err['role']="Enter Role";
    }
    if (isset($_POST['status']) && !empty($_POST['status'])&& trim($_POST['status'])!='') {
    $admin->set('status',$_POST['status']);
    }else{
    $err['status']='select Status';
    }
            $admin->set('name',$_POST['name']);
            $admin->set('username',$_POST['username']);
            $admin->set('password',$_POST['password']);
            $admin->set('email',$_POST['email']);
            $admin->set('last_login',date('Y-m-d H:i:s'));
            if (count($err)==0) {
            $res=   $admin->create();
            }
        }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
</head>
<body>
    <h1 class="demoInputBox">Admin Management</h1>
       <?php if(isset($res) && $res >0){ ?>
                    <div style="color:#0f0">
                    Admin Inserted</div>
                    <?php }else if(isset($res) && $res==false){ ?>
                    <div style="color:#f00">
                   Admin Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data" novalidate="" id="admin_form">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="" required="">
        <?php if(isset($err['name'])){
      echo $err['name'];
    }?>
      </td>
    </tr>
    <tr>
      <td>UserName</td>
      <td><input type="text" class="demoInputBox" name="username" value="" required="">
            <?php if(isset($err['username'])){
            echo $err['username'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email" value="" required="">
            <?php if(isset($err['email'])){
            echo $err['email'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" class="demoInputBox" name="password" value="" required="">
            <?php if(isset($err['password'])){
            echo $err['password'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Role</td>
      <td><input type="role" class="demoInputBox" name="role" value="" required="">
            <?php if(isset($err['role'])){
            echo $err['role'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="radio" name="status" id="status" value="1">Active
      <input type="radio" name="status" id="status" value="0" checked="" required="">DeActive
          <?php if(isset($err['status'])){
          echo $err['status'];
    }?>
      </td>
    </tr>
    <tr>
      <td colspan=2>
       <input type="submit" name="btnSave" value="Save Admin" class="btnSave">
       <input type="submit" name="register-user" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>
<script src="../js/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validation/dist/validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#admin_form').validate();
            // console.log('hello');
        });
    </script>

</body>
</html>

