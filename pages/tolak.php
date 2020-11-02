<?php 
session_start();
require '../functions.php';



if(!isset($_SESSION["login"])){
	header ("Location: ../login.php");
	exit;
}


$id = $_GET["id"];

if(tolak($id) == true){
	header ("Location: persetujuan.php");
	exit;
}

?>