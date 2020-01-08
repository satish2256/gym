<?php
require_once"class/attandance.class.php";
	$attandance=new Attandance();
	$attandance->set('id',$_GET['id']);
	$attandance->remove();
	header('location:list_attandance.php');
?>