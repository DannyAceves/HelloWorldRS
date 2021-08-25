<?php
include("includes/conectar.php");
session_start();
if(isset($_REQUEST['cerrar'])){
	session_destroy();
	header("Location: index.php");
}
if(!$_SESSION){
	header("Location: index.php");
}
$s="SELECT * FROM usuario WHERE email='".$_SESSION['user']."'";
$q=mysql_query($s);	
$row=mysql_fetch_assoc($q);
?>
<!DOCTYPE html>


<html>
<body background="img/SesionWeb.jpg">
<head>
	<title>Pagina de Inicio</title>
</head>
<body>
<?php
echo "<img src='fotos/".$_SESSION['user']."_".$row['foto']."' width=100 height=100>";
echo $row['nombre'];
?>
<a href="inicio.php?cerrar=ok">Cerrar Sesión</a>

</body>
</html>