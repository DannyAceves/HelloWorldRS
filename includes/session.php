<?php
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	$query="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'";
	$us=$conexion->query($query);
	$numfilas=mysqli_num_rows($us);
	if($numfilas==1){
		$array=mysqli_fetch_array($us);
		echo "<a href='muro.php'><img src='fotos/".$_SESSION['usuario'].
		"_".$array['foto']."' width='20' heigth='20'> ".$array['nombre']."</a>";
		}else{
			echo "<center>Error</center>";
		}
}
?>