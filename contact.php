<?php
$title="create_contact";
require_once"object.php";
       if(isset($_POST['btnSave'])){
         $err=[];
          if(isset($_POST['name'])&&!empty($_POST['name'])){
            $name=$_POST['name'];
          }else{
            $err['name']="Enter a Name";
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
          if(isset($_POST['phone'])&&!empty($_POST['phone'])){
            $phone=$_POST['phone'];
          }else{
            $err['phone']="Enter a Phone";
          }
          if(isset($_POST['message'])&&!empty($_POST['message'])){
             $contact->set('message',$_POST['message']);
          }else{
            $err['message']="Enter a Message";
          }
          if(isset($_POST['status'])&&!empty($_POST['status'])){
            $contact->set('status',$_POST['status']);
          }else{
            $err['status']="Select a Status";
          }
            $contact->set('name',$_POST['name']);
            $contact->set('email',$_POST['email']);
            $contact->set('phone',$_POST['phone']);
            if(count($err)==0){
            $status=$contact->create();
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
  <h1>Contact Form</h1>
  <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Contact Inserted</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Contact Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form name="" method="post" action="">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
        <?php
        if(isset($err['name'])){
          echo $err['name'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" class="demoInputBox" name="email" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
        <?php
        if(isset($err['email'])){
          echo $err['email'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input type="text" class="demoInputBox" name="phone" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
        <?php
        if(isset($err['phone'])){
          echo $err['phone'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td>Message</td>
      <td><textarea name="message" class="demoInputBox"></textarea>
        <?php
        if(isset($err['message'])){
          echo $err['message'];
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
       <input type="submit" name="btnSave" value="Submit" class="btnSave">
       <input type="submit" name="btnSave" value="Cancle" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

