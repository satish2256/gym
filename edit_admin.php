<?php 
 $title="Edit_Admin"; 
 include_once "header.php";
 $admin-> set('id',$_GET['id']);
        if(isset($_POST['btnUpdate'])){
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
    if(isset($_POST['email'])&& !empty($_POST['email'])&& trim($_POST['email'])!=''){
      $email=$_POST['email'];
    }else{
      $err['email']="Enter Email";
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
            $status=$admin->edit();
        }
        $data=$admin->getadmin();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
</head>
<body>
    <h1 class="demoInputBox">Admin Management</h1>
       <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Admin Updated</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Admin Update failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="<?php echo $data[0]->name?>" required="">
        <?php if(isset($err['name'])){
      echo $err['name'];
    }?>
      </td>
    </tr>
    <tr>
      <td>UserName</td>
      <td><input type="text" class="demoInputBox" name="username" value="<?php echo $data[0]->username?>" required="">
            <?php if(isset($err['username'])){
            echo $err['username'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email" value="<?php echo $data[0]->email?>" required="">
            <?php if(isset($err['email'])){
            echo $err['email'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" class="demoInputBox" name="password" value="<?php echo $data[0]->password?>" required="">
            <?php if(isset($err['password'])){
            echo $err['password'];
    }?>
      </td>
    </tr>
    <tr>
      <td>Role</td>
      <td><input type="role" class="demoInputBox" name="role" value="<?php echo $data[0]->role?>" required="">
            <?php if(isset($err['role'])){
            echo $err['role'];
    }?>
      </td>
    </tr>
   <tr>
      <td>Status</td>
       <?php if($data[0]->status == 1) {?>
      <td><input type="radio" name="status" id="Status" value="1" checked="">Active
     <input type="radio" name="status" value="0"> DeActive</td>
   <?php }else{?>
      <td><input type="radio" name="status" id="Status" value="1">Active
     <input type="radio" name="status" value="0" checked=""> DeActive</td>
    <?php }?>
      <?php
        if(isset($err['status'])){
          echo $err['status'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan=2>
       <input type="submit" name="btnUpdate" value="Save Admin" class="btnSave">
       <input type="submit" name="btnUpdate" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

