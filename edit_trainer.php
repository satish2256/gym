<?php 
 $title="Edit_Trainer"; 
 include_once "header.php";
 $trainer-> set('id',$_GET['id']);
        if(isset($_POST['btnUpdate'])){
          $err=[];
          if(isset($_POST['name'])&&!empty($_POST['name'])){
            $name=$_POST['name'];
          }else{
            $err['name']="Enter a Name";
          }
          if(isset($_POST['shift'])&&!empty($_POST['shift'])){
            $shift=$_POST['shift'];
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
          if(isset($_POST['phone'])&&!empty($_POST['phone'])){
            $phone=$_POST['phone'];
          }else{
            $err['phone']="Enter a phone";
          }
          if(isset($_POST['email'])&&!empty($_POST['email'])){
            $email=$_POST['email'];
          }else{
            $err['email']="Enter a Email";
          }
          if(isset($_POST['image'])&&!empty($_POST['image'])){
            $image=$_POST['image'];
          }else{
            $err['image']="Enter a Image";
          }
          if(isset($_POST['gender'])&&!empty($_POST['gender'])){
            $gender=$_POST['gender'];
          }else{
            $err['gender']="Select a Gender";
          }
          if(isset($_POST['status'])&&!empty($_POST['status'])){
            $status=$_POST['status'];
          }else{
            $err['status']="Select a Status";
          }
            $trainer->set('name',$_POST['name']);
            $trainer->set('shift',$_POST['shift']);
            $trainer->set('package',$_POST['package']);
            $trainer->set('address',$_POST['address']);
            $trainer->set('dob',$_POST['dob']);
            $trainer->set('phone',$_POST['phone']);
            $trainer->set('email',$_POST['email']);
            //upload images
            // print_r($_FILES);
            if(isset($_FILES['image']['name'])&& !empty($_FILES['image']['name'])){
                $name= uniqid().'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'image/trainer/'.$name);
                $trainer->set('image',$name);
        }
            $trainer->set('gender',$_POST['gender']);
            $trainer->set('status',$_POST['status']);
            $trainer->set('Updated_by',$_SESSION['admin_username']);
            $trainer->set('Updated_date',date('Y-m-d H:i:s'));
            $status=$trainer->edit();
}
$data=$trainer->gettrainer();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
</head>
<body>
    <h1 class="demoInputBox">Trainer Management</h1>
    <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Trainer Updated</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Trainer Update failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="<?php echo $data[0]->name?>" required="">
        <?php
        if(isset($err['name'])){
          echo $err['name'];
        }
        ?>
      </td>
    </tr>
    <tr>
    <td>Trainer Shift</td>
      <?php if($data[0]->shift == 'm') {?>
             <td><input type="radio" name="shift" value="m" checked=""> Morning
          <input type="radio" name="shift" value="e"> Evening</td>
        <?php }else{?>
             <td><input type="radio" name="shift" value="m"> Morning
          <input type="radio" name="shift" value="e" checked=""> Evening</td>
        <?php }?>
      <?php
        if(isset($err['shift'])){
          echo $err['shift'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Trainer Package</td>
      <td><input type="text" class="demoInputBox" name="package" value="<?php echo $data[0]->package?>" required="">
        <?php
        if(isset($err['package'])){
          echo $err['package'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" class="demoInputBox" name="address" value="<?php echo $data[0]->address?>" required="">
        <?php
        if(isset($err['address'])){
          echo $err['address'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Date Of Birth</td>
      <td><input type="date" class="demoInputBox" name="dob" value="<?php echo $data[0]->dob?>" required="">
        <?php
        if(isset($err['dob'])){
          echo $err['dob'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td><input type="number" class="demoInputBox" name="phone" value="<?php echo $data[0]->phone?>" required="">
        <?php
        if(isset($err['phone'])){
          echo $err['phone'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email" value="<?php echo $data[0]->email?>" required="">
        <?php
        if(isset($err['email'])){
          echo $err['email'];
        }
        ?>
      </td>
    </tr>
     <tr>
      <td>Image</td>
      <td><input type="File" name="image" required="">
        <br>
        <img src="image/trainer/<?php echo $data[0]->image?>" width="50px">
        <?php
        if(isset($err['image'])){
          echo $err['image'];
        }
        ?>
      </td>
    </tr>
   <tr>
      <td>Gender</td>
      <?php if($data[0]->gender == 'm') {?>
        
             <td><input type="radio" name="gender" value="m" checked=""> Male
          <input type="radio" name="gender" value="f"> Female</td>
        <?php }else{?>
             <td><input type="radio" name="gender" value="m"> Male
          <input type="radio" name="gender" value="f" checked=""> Female</td>
        <?php }?>
      <?php
        if(isset($err['gender'])){
          echo $err['gender'];
        }
        ?>
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
       <input type="submit" name="btnUpdate" value="Save Member" class="btnSave">
       <input type="submit" name="btnUpdate" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

