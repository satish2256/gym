<?php
require_once"class/trainer.class.php";
	$trainer=new Trainer();
	$trainer->set('id',$_GET['id']);
	$trainer->remove();
	header('location:list_trainer.php');
?>