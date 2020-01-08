<?php 
$title="list_attandance";
require_once "header.php"; 
$data= $attandance->lists();
// print_r($data);

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="stylesheet" type="text/css" href="css/regist.css">
    <style>
        table{
            width:100px;
            margin: auto;
           /* text-align: center;*/
            /*able-layout: fixed;*/
        }
        table,tr,th,td{
            padding: 12px;
            color: white;
            border: 1px solid white;
            border-collapse: collapse;
            font-size: 12px;
            font-family: arial;
            background: linear-gradient (top,#3c3c3c 0% #222222 100%);
            background:-webkit-linear-gradient (top,#3c3c3c 0% #222222 100%);  
        }
    </style>
</head>
<body>
    <h1 class="demoInputBox">List Attandance</h1>
    <table border="1">
          <thead class="demoInputBox">
            <tr>
             <th>ID</th>
             <th>Member ID</th>
             <th>Attandance Date</th>
             <th>Status</th>
             <th>Created_By</th>
             <th>Created_Date</th>
             <th>Updated Date</th>
            <th>Updated By</th>
             <th>Action</th>
             </tr>
        </thead>
            <tbody>
            <?php $i=1;foreach ($data as $d) {?>
            <tr>
             <td><?php echo $i++ ?></td>
            <td><?php echo $d->member_id ?></td>
            <td><?php echo $d->Adate ?></td>
            <td><?php if ($d->status==1){ ?><span style="color:green">Active
                            </span>
                            <?php }else{?>
                            <span style="color:red">DeActive</span>
                            <?php }?>
                         </td>
            <td><?php echo $d->created_by ?></td>
            <td><?php echo $d->created_date ?></td>
            <td><?php echo $d->updated_date ?></td>
            <td><?php echo $d->updated_by ?></td>
            <td><a href="delete.attandance.php?id=<?php echo $d->id?>"
                 onclick ="return confirm('Are you sure to delete?')"><span style="color:red">Delete</a>
                <a href="edit_attandance.php?id=<?php echo $d->id?>"><span style="color:green">Edit</a></td>
                        </tr>
                    <?php }?>
        </tbody>
        </table>

</body>
</html>