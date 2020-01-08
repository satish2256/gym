<?php
 $title="create_package";
 include_once "header.php";
      if(isset($_POST['btnSave'])){
          $err=[];
          if(isset($_POST['name'])&&!empty($_POST['name'])){
            $name=$_POST['name'];
          }else{
            $err['name']="Enter a Name";
          }
          if(isset($_POST['title'])&&!empty($_POST['title'])){
            $member->set('title',$_POST['title']);
          }else{
            $err['title']="Enter a Title";
          }
          if(isset($_POST['price'])&&!empty($_POST['price'])){
            if(($_POST['price'])<0){
              $err['price']="Price can't be negative";
            }
            else{
            $price=$_POST['price'];
            }
          }else{
            $err['price']="Enter a Price";
          }
          if(isset($_POST['description'])&&!empty($_POST['description'])){
            $description=$_POST['description'];
          }else{
            $err['description']="Enter a Description";
          }
          if(isset($_POST['status'])&&!empty($_POST['status'])){
            $package->set('status',$_POST['status']);
          }else{
            $err['status']="Select a Status";
          }
            $package->set('name',$_POST['name']);
            $package->set('title',$_POST['title']);
            $package->set('price',$_POST['price']);
            $package->set('description',$_POST['description']);
               //upload images
            // print_r($_FILES);
            if(isset($_FILES['image']['name'])&& !empty($_FILES['image']['name'])){
                $name= uniqid().'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'image/package/'.$name);
                $package->set('image',$name);
        }
            $package->set('created_by',$_SESSION['admin_username']);
            $package->set('created_date',date('Y-m-d H:i:s'));
            if (count($err)==0) {
            $status=$package->create();
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
    <h1 class="demoInputBox">Package Management</h1>
      <?php if(isset($status) && $status >0){ ?>
                    <div style="color:#0f0">
                    Package Inserted</div>
                    <?php }else if(isset($status) && $status==false){ ?>
                    <div style="color:#f00">
                   Package Insert failed</div>
                    <?php }else{ ?>
                    <?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  <table border="0" width="500" align="center" class="demo-table">
    <tr>
      <td>Name</td>
      <td><input type="text" class="demoInputBox" name="name" value="">
       <?php
        if(isset($err['name'])){
          echo $err['name'];
        }
        ?></td>
    </tr>
    <tr>
      <td>Title</td>
      <td><input type="text" class="demoInputBox" name="title" value="">
         <?php
        if(isset($err['title'])){
          echo $err['title'];
        }
        ?>
      </td>
    </tr>
      <td>Price</td>
      <td><input type="number" class="demoInputBox" name="price" value="">
       <?php
        if(isset($err['price'])){
          echo $err['price'];
        }
        ?></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><textarea name="description"></textarea>
       <?php
        if(isset($err['description'])){
          echo $err['description'];
        }
        ?></td>
    </tr>
    <tr>
       <td>Image</td>
      <td><input type="file" class="demoInputBox" name="image" value="">
       <?php
        if(isset($err['image'])){
          echo $err['image'];
        }
        ?></td>
    </tr>
    <tr>
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
       <input type="submit" name="btnSave" value="Save Package" class="btnSave">
       <input type="submit" name="btnSave" value="Clear" class="btnSave">
     </td>
    </tr>
  </table>
</form>

</body>
</html>

