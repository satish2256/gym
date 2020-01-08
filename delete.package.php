<?php
require_once"class/package.class.php";
	$package=new Package();
	$package->set('id',$_GET['id']);
	$package->remove();
	header('location:list_package.php');
?>