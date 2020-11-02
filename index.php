<?php 
session_start();

if(!isset($_SESSION['username'])){
	header("Location: login.php");
	exit;
}else{
	header("Location: pages/home.php");
	exit;
}
//die('hi');
?>
