<?php
 $title="create_attandance";
 include_once "header.php";
// print_r($_POST);
        if(isset($_POST['btnSave'])){
          $err=[];
          if(isset($_POST['id'])&&!empty($_POST['id'])){
            $attandance->set('member_id',$_POST['id']);
          }else{
            $err['id']="Enter a Name";
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
           if(count($err)==0){
            $status=$attandance->create();
          }
    }
        $data=$member->getMemberForSelect();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/regist.css">
</head>
<body>
    <h1 class="demoInputBox">Attandance Management</h1>
    <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Attandance Inserted</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Attandance Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Member Name</td>
      <td>
         <select name="id" id="id"  class="demoInputBox">
          <option value="">Select Member</option>
            <?php foreach ($data as $d) {?>
            <option value="<?php echo $d->id?>">
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

