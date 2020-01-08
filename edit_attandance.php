<?php
 $title="edit_attandance";
 include_once "header.php";

        if(isset($_POST['btnSave'])){
           $err=[];
          if(isset($_POST['member_id'])&&!empty($_POST['member_id'])){
            $member_id=$_POST['member_id'];
          }else{
            $err['member_id']="Enter a Name";
          }
          if(isset($_POST['Adate'])&&!empty($_POST['Adate'])){
            $attandance->set('Adate',$_POST['Adate']);
          }else{
            $err['Adate']="Enter a Attandance Date";
          }
          if(isset($_POST['status'])&&!empty($_POST['status'])){
            $attandance->set('status',$_POST['status']);
          }else{
            $err['status']="Select a Status";
          }
            $attandance->set('member_id',$_POST['member_id']);
            $attandance->set('Adate',$_POST['Adate']);
            $status=$attandance->create();
        }
        $data=$member->getMemberForSelect();
        $data=$attandance->getattandance();


?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
</head>
<body>
    <h1 class="demoInputBox">Attandance Management</h1>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Member Name</td>
      <td>
         <select name="member_id" id="member_id" class="demoInputBox">
          <option value="">Select Member</option>
            <?php foreach ($data as $d) {?>
            <option value="<?php echo $d->name?>">
              <?php echo $d->name?></option>
                  <?php }?>
                      </select>
      </td>
    </tr>
    <tr>
      <td>Attandance Date</td>
      <td><input type="date" class="demoInputBox" name="Adate">
      <?php
        if(isset($err['Adate'])){
          echo $err['Adate'];
        }
        ?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input type="radio" name="status" value="1"> Present
      <input type="radio" name="status" value="0"> Adsent
      <?php
        if(isset($err['status'])){
          echo $err['status'];
        }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan=2>
       <input type="submit" name="btnSave" value="Save Attandance" class="btnSave">
       <input type="submit" name="btnSave" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

