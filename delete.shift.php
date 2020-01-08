<?php
require_once"class/shift.class.php";
	$shift=new Shift();
	$shift->set('id',$_GET['id']);
	$shift->remove();
	header('location:list_shift.php');
?>