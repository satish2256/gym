<?php
require_once"class/admin.class.php";
	$admin=new Admin();
	$admin->set('id',$_GET['id']);
	$admin->remove();
	header('location:list_admin.php');
?>