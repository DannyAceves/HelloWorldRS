<?php

if(isset($_SESSION['usuario']) && isset ($_GET['id_pub']) && isset($_GET['like'])){
	$email=$_SESSION['usuario'];
	$id= $_GET['id_pub'];
	$like= $_GET['like'];
	$insertar= "INSERT INTO like VALUES('$email','id','like')";
	$ejecutar=mysql_query($insertar);
	header("location: ../.php");
}

?>