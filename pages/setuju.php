<?php 
session_start();
require '../functions.php';



if(!isset($_SESSION["login"])){
	header ("Location: ../login.php");
	exit;
}


$id = $_GET["id"];

 if(setuju($id) == true){
	header ("Location: persetujuan.php");
	exit;
}

?>