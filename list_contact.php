<?php 
$title="list_contact";
require_once "header.php"; 
$data= $contact->lists();
// print_r($data);

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="stylesheet" type="text/css" href="css/regist.css">
    <style>
        table{
            width:1200px;
            margin: auto;
           /* text-align: center;*/
            /*able-layout: fixed;*/
        }
        table,tr,th,td{
            padding: 20px;
            color: white;
            border: 1px solid white;
            border-collapse: collapse;
            font-size: 17px;
            font-family: arial;
            background: linear-gradient (top,#3c3c3c 0% #222222 100%);
            background:-webkit-linear-gradient (top,#3c3c3c 0% #222222 100%);  
        }
    </style>
</head>
<body>
    <h1 class="demoInputBox">List Contact</h1>
    <table border="1">
          <thead class="demoInputBox">
            <tr>
             <th>SN</th>
             <th>Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Message</th>
             <th>Status</th>
             <th>Action</th>
             </tr>
        </thead>
            <tbody>
            <?php $i=1;foreach ($data as $d) {?>
            <tr>
             <td><?php echo $i++ ?></td>
            <td><?php echo $d->name ?></td>
            <td><?php echo $d->email ?></td>
            <td><?php echo $d->phone ?></td>
            <td><?php echo $d->message ?></td>
            <td><?php if ($d->status==1){ ?><span style="color:green">Active
                            </span>
                            <?php }else{?>
                            <span style="color:red">DeActive</span>
                            <?php }?>
                         </td>
            <td><a href="contact_delete.php?id=<?php echo $d->id?>"
                 onclick ="return confirm('Are you sure to delete?')"><span style="color:red">Delete</span></a>
                        </tr>
                    <?php }?>
        </tbody>
        </table>

</body>
</html>