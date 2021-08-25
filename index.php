<?php
include('includes/conectar.php');
session_start();
if($_SESSION){
	//header("Location: pinicio.php");
}
if(isset($_REQUEST['user'])){
	$u=$_REQUEST['user'];
	$p=$_REQUEST['pass'];
	$sql="SELECT * FROM usuario WHERE email='$u' AND pass='$p'";
	$q=$conexion->query($sql);
	$n=mysqli_num_rows($q);
	if($n>0){
		$_SESSION['usuario']=$_REQUEST['user'];
		header("Location: pinicio.php");
	}

}
?>
<html>
<head>
    <meta charset="UTF-8">
	<title>Hello World</title>
	<link rel="stylesheet" type="text/css" href="css/misestilos.css">
</head>
<body background="img/images.jpg">
    <?php include("barra superior.php"); ?>
    <br>
    <br>
    <br>
	<form method="post" action="index.php">
		<h1> WELCOME PEOPLE </h1>
		<INPUT type="text" name="user" placeholder="EMAIL" required><br><br>
		<INPUT type="password" name="pass" placeholder="PASSWORD" required><br><br>
		<input id="ic" type="submit" value="INICIAR SESIÓN"><br>
	</form>
	<br><br>
	<a href="registro.php">REGISTRATE</a>
</body>
</html>