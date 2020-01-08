<?php 
 $title="Create_Member"; 
 include_once "header.php";
        if(isset($_POST['btnSave'])){
          $err=[];
          if(isset($_POST['name'])&&!empty($_POST['name'])){
            $name=$_POST['name'];
          }else{
            $err['name']="Enter a Name";
          }
          if(isset($_POST['shift'])&&!empty($_POST['shift'])){
            $member->set('shift',$_POST['shift']);
          }else{
            $err['shift']="Select a Shift";
          }
          if(isset($_POST['package'])&&!empty($_POST['package'])){
            $package=$_POST['package'];
          }else{
            $err['package']="Enter a Package";
          }
          if(isset($_POST['address'])&&!empty($_POST['address'])){
            $address=$_POST['address'];
          }else{
            $err['address']="Enter a Address";
          }
          if(isset($_POST['dob'])&&!empty($_POST['dob'])){
            $dob=$_POST['dob'];
          }else{
            $err['dob']="Enter a Date of Birth";
          }
          if(isset($_POST['phone'])&& !empty($_POST['phone'])){
            $phone=$_POST['phone'];
          }else{
            $err['phone']="Enter a phone";
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
         
          if(isset($_POST['gender'])&&!empty($_POST['gender'])){
            $member->set('gender',$_POST['gender']);
          }else{
            $err['gender']="Select a Gender";
          }
          if(isset($_POST['status'])&&!empty($_POST['status'])){
            $member->set('status',$_POST['status']);
          }else{
            $err['status']="Select a Status";
          }
            $member->set('name',$_POST['name']);
            $member->set('package',$_POST['package']);
            $member->set('address',$_POST['address']);
            $member->set('dob',$_POST['dob']);
            $member->set('phone',$_POST['phone']);
            $member->set('email',$_POST['email']);
            //upload images
            // print_r($_FILES);
            if(isset($_FILES['image']['name'])&& !empty($_FILES['image']['name'])){
                $name= uniqid().'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'image/Member/'.$name);
                $member->set('image',$name);
            }
            $member->set('created_by',$_SESSION['admin_username']);
            $member->set('created_date',date('Y-m-d H:i:s'));
            // print_r($err);
            if (count($err) == 0) {
              $status=$member->create();
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
    <h1 class="demoInputBox">Member Management</h1>
    <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Member Inserted</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Member Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Member Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="">
        <?php
        if(isset($err['name'])){
          echo $err['name'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Shift</td>
      <td><input type="radio" name="shift" value="m"> Morning
      <input type="radio" name="shift" value="e"> Evening
      <?php
        if(isset($err['shift'])){
          echo $err['shift'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Member Package</td>
      <td><input type="text" class="demoInputBox" name="package" value="">
        <?php
        if(isset($err['package'])){
          echo $err['package'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" class="demoInputBox" name="address" value="">
        <?php
        if(isset($err['address'])){
          echo $err['address'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Date Of Birth</td>
      <td><input type="date" class="demoInputBox" name="dob" value="">
        <?php
        if(isset($err['dob'])){
          echo $err['dob'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td><input type="number" class="demoInputBox" name="phone" value="">
        <?php
        if(isset($err['phone'])){
          echo $err['phone'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email">
        <?php
        if(isset($err['email'])){
          echo $err['email'];
        }
        ?>
      </td>
    </tr>
     <tr>
      <td>Image</td>
      <td><input type="file" name="image">
        <?php
        if(isset($err['image'])){
          echo $err['image'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" value="m"> Male
      <input type="radio" name="gender" value="f"> Female
      <?php
        if(isset($err['gender'])){
          echo $err['gender'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="radio" name="status" value="1"> Active
      <input type="radio" name="status" value="0"> DeActive
      <?php
        if(isset($err['status'])){
          echo $err['status'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan=2>
       <input type="submit" name="btnSave" value="Save Member" class="btnSave">
       <input type="submit" name="btnSave" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

