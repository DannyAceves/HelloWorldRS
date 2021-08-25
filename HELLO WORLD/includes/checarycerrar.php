<?php
session_start();
if(isset($_GET['cerrar']) && $_GET['cerrar']=="ok"){
	session_destroy();
	header("Location: index.php");
}

if(!$_SESSION['usuario']){
	header("Location: index.php");
}

?>