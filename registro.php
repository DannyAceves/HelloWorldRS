<?php
include('includes/conectar.php');
if(isset($_REQUEST['email'])){
	$e=$_REQUEST['email'];
	$p=$_REQUEST['pass'];
	$n=$_REQUEST['nombre'];
	$fe=$_REQUEST['fecha'];
	$s=$_REQUEST['sexo'];
	$f=$_FILES['foto']['name'];
	move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/".$e."_".$_FILES['foto']['name']);
	$sql="INSERT INTO usuario VALUES('$e','$p','$fe','$n','$s','registro nuevo','$f')";
	$conexion->query($sql);
	header("Location: index.php");
}
?>
<html>
<head>
    <meta charset="UTF-8">
	<title>Hello World</title>
	<link rel="stylesheet" type="text/css" href="css/misestilos.css">
</head>
    <body background="img/images.jpg">
    <?php include('barra superior.php');?>
    <br>
    <br>
    <br> 
<form action="registro.php" method="post" enctype="multipart/form-data">	
<h1>WELCOME BOYS</h1>
<INPUT type="email" name="email" placeholder="Email" required><br><br>
<INPUT type="password" name="pass" placeholder="Password" required><br><br>
<INPUT type="text" name="nombre" placeholder="Nombre" required><br>
<p> Sexo
</p>
<select name="sexo">
<option value="Masculino">Masculino</option>
<option value="Femenino">Femenino</option>
</select><br>
<p> Fecha de Nacimiento
</p>
<input	type="date" name="fecha" required><br>
<p> Fotografía
</p>
<input type="file" name="foto" required><br>
<br>
<br>
<input id="R" type="submit" value="REGISTRARCE">
</form>
</body>

</html>