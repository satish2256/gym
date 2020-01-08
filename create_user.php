<?php 
 $title="create_user";
include_once "header.php";
if(isset($_POST['btnSave'])){
    $err=[];
    //check for name field
    if(isset($_POST['name'])&& !empty($_POST['name']) && trim($_POST['name'])!=''){
      $name=$_POST['name'];
    }else{
      $err['name']="Enter a Name";
    }
    //check for email
    if(isset($_POST['username'])&& !empty($_POST['username'])&& trim($_POST['username'])!=''){
      $username=$_POST['username'];
    }else{
      $err['username']="Enter a UserName";
    }
    //check for phone no
    if(isset($_POST['email'])&&!empty($_POST['email'])&&trim($_POST['email'])!=''){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                    $admin->set('email',$_POST['email']);
                }else{
                    $err['email']='Invalid Email';
                }

            }else{
                $err['email']="Enter email";
            }
    //check for dob
    if(isset($_POST['password'])&& !empty($_POST['password']) && trim($_POST['password'])!=''){
      $password=$_POST['password'];
    }else{
      $err['password']="Enter Password";
    }
    // check for gender
    if (isset($_POST['status']) && !empty($_POST['status'])&& trim($_POST['status'])!='') {
    $status=$_POST['status'];
    }else{
    $err['status']='select Status';
    }
            $user->set('name',$_POST['name']);
            $user->set('username',$_POST['username']);
            $user->set('password',$_POST['password']);
            $user->set('email',$_POST['email']);
            $user->set('last_login',date('Y-m-d H:i:s'));
            $user->set('status',$_POST['status']);
            $status=$user->create();
        }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
</head>
<body>
    <h1 class="demoInputBox">User Management</h1>
       <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    User Inserted</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   User Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="">
        <?php if(isset($err['name'])){
      echo $err['name'];
    }?>
      </td>
    </tr>
    <tr>
      <td>UserName</td>
      <td><input type="text" class="demoInputBox" name="username" value="">
            <?php if(isset($err['username'])){
            echo $err['username'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email" value="">
            <?php if(isset($err['email'])){
            echo $err['email'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" class="demoInputBox" name="password" value="">
            <?php if(isset($err['password'])){
            echo $err['password'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="radio" name="status" id="status" value="1">Active
      <input type="radio" name="status" id="status" value="0" checked="">DeActive
          <?php if(isset($err['status'])){
          echo $err['status'];
    }?>
      </td>
    </tr>
    <tr>
      <td colspan=2>
       <input type="submit" name="btnSave" value="Save User" class="btnSave">
       <input type="submit" name="register-user" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

