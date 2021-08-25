<?php
	sesion_start();
	if(isset($_GET['email']) && $_GET['email']==$_SESSION['email']){
		header("Location: ../muro.php");
	}else{
		$_SESSION['amigo']=$_GET['email'];
		header("Location: ../muroamigo.php");
	}
	?>
