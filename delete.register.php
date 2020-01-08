<?php
require_once"class/register.class.php";
	$register=new Register();
	$register->set('id',$_GET['id']);
	$register->remove();
	header('location:list_register.php');
?>