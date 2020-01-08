<?php 
$title="create_shift";
include_once "header.php";

        if(isset($_POST['btnSave'])){
           $err=[];
          if(isset($_POST['from_time'])&&!empty($_POST['from_time'])){
            $from_time=$_POST['from_time'];
          }else{
            $err['from_time']="Enter a From Time";
          }
          if(isset($_POST['to_time'])&&!empty($_POST['to_time'])){
            $member->set('to_time',$_POST['to_time']);
          }else{
            $err['to_time']="Enter a To Time";
          }
          if(isset($_POST['description'])&&!empty($_POST['description'])){
            $description=$_POST['description'];
          }else{
            $err['description']="Enter a Description";
          }
          if(isset($_POST['shift'])&&!empty($_POST['shift'])){
             $shift->set('shift',$_POST['shift']);
          }else{
            $err['shift']="Enter a Shift";
          }
          if(isset($_POST['status'])&&!empty($_POST['status'])){
            $shift->set('status',$_POST['status']);
          }else{
            $err['status']="Select a Status";
          }
            $shift->set('from_time',$_POST['from_time']);
            $shift->set('to_time',$_POST['to_time']);
            $shift->set('description',$_POST['description']);
            $shift->set('created_by',$_SESSION['admin_username']);
            $shift->set('created_date',date('Y-m-d H:i:s'));
           if(count($err)==0){
            $status=$shift->create();
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
    <h1 class="demoInputBox">Shift Management</h1>
     <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Shift Inserted</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Shift Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Shift From Date</td>
      <td><input type="date" class="demoInputBox" name="from_time">
         <?php
         if(isset($err['from_time'])){
          echo $err['from_time'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Shift To Date</td>
      <td><input type="date" class="demoInputBox" name="to_time">
         <?php
         if(isset($err['to_time'])){
          echo $err['to_time'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td><input type="text" class="demoInputBox" name="description">
        <?php
         if(isset($err['status'])){
          echo $err['status'];
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
      <td colspan=2>
       <input type="submit" name="btnSave" value="Save User" class="btnSave">
       <input type="submit" name="btnSave" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

