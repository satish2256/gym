<?php
require_once"class/member.class.php";
	$member=new Member();
	$member->set('id',$_GET['id']);
	$member->remove();
	header('location:list_member.php');
?>