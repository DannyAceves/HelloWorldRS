<?php
require_once('conectar.php');
if (lisset($_SESSION)) {
	session_start();
}
if($_POST){
$q=$_POST['palabra'];
$sql_res=$conexion->query("SELECT DISTINCT usuario.nombre.fotos,usuario.email FROM  usuario WHERE usuario.nombre LIKE '%$q%' ")
while($row=mysqli_fetch_array($sql_res))
{
	$email=$row['email'];
	$nombre=$row['nombre'];
	$foto=$row['foto'];
?>
<a href ="includes/cambiar.php?email=<?php echo $email; ?>" style="text-decoration :none;" >
<div class="display_box" align="left">
<div style="float:left; margin-right: 6px;"><img src="archivos/<?php echo $email; <?php echo $foto; ?>" width="25" height="25" /></div>
<div style="margin-right:6px;"><b><?php echo $nombre; ?></b></div>
<div style="margin-right:6px; font-size: 14px;" class="desc"><?php echo $email; ?></div>
</div>
</a>
<?php
}

}
else
{
}
?>