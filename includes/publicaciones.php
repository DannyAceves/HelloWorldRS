<?php
$numero=10;
if(isset($_GET['aumenta']) && $_GET['aumenta']==1){
	$_SESSION['numero']=$_SESSION['numero']+$numero;
}else{
	$_SESSION['numero']=10;
}
$tpub="SELECT publicaciones.idpub, publicaciones.email, publicaciones.emailamigo , publicaciones.texto, publicaciones.fecha, 
COUNT(comentarios.idcom) AS numcom, publicaciones.imagen, publicaciones.video, usuario.foto, usuario.nombre FROM usuario 
INNER JOIN (publicaciones LEFT JOIN comentarios ON publicaciones.idpub= comentarios.idpub) ON publicaciones.emailamigo=usuario.email 
GROUP BY publicaciones.idpub, publicaciones.texto, publicaciones.fecha ORDER BY publicaciones.fecha DESC LIMIT 0,". $_SESSION['numero'];
$ej=$conexion->query($tpub);
$nf=mysqli_num_rows($ej);
$tp=mysqli_fetch_assoc($ej);
 
$user= "SELECT * FROM usuario WHERE email= ' ".$_SESSION['usuario']."'";
$ejuser=$conexion->query($user);
$nfuser = mysqli_num_rows($ejuser);
$auser= mysqli_fetch_assoc($ejuser);

if(isset ($_POST ['np']) && $_POST['np']=="ok"){
	$imagen=$_FILES['imagen']['name'];
	$texto=$_POST['texto'];
	//$video=$_POST['video'];
	$email=$_SESSION['usuario'];
	$emailamigo=$_SESSION['usuario'];
	$f=$_POST['fecha'];
	$insertar=" INSERT INTO publicaciones VALUES (NULL , '$email', '$texto', '$imagen', NULL , NULL , '$emailamigo') ";
	$ejecutar=$conexion->query($insertar);
	$id=mysqli_insert_id();
	if($imagen!=''){
		copy($_FILES['imagen']['tmp_name'],"fotos/".$email."_".$id."_". $imagen);
	}
	header("Location: pinicio.php");
}

if(isset($_POST['nc']) && $_POST['nc']=="ok"){
	$texto=$_POST['comen'];
	$email=$_SESSION['usuario'];
	$idpub=$_POST['idpub'];
	$insertar="INSERT INTO comentarios VALUES(NULL,$idpud,'texto','$email',NULL)";
	$ejecutar=$conexion->query($insertar);
	header("Location: pinicio.php");
}
?>

 <form name=form1 action="pinicio.php" method="POST" enctype="multipart/form-data">
 <table width="400">
 <tr>
 <td align="right">
 <hr>
 <textarea class="texto" name="texto" cols=60 rows=4 placeholder="¿Qué estás pensando?" required></textarea>
 </td>
 </tr>
 <tr>
 <td align="right">
 Sube Imagen : <input type = "file" name="imagen" placeholder="Id Video YouTube">
 </td>
 </tr>
 <tr>
 <td align="right">
 <input type="hidden" name="np" value="ok">
 <input type="hidden" name="fecha" value="">
<button type="submit" width="35.63px" height="25.63px"><img src="img/publish.png" style="padding-left:5px;padding-right:5px; padding-top:3px;padding-bottom:3px;"></button> </form>
 <hr>
 </td>
 </tr>
 </table>

<table width="500" align="left">
<?php do{ ?>
<tr >
<td align="right" width="40"     >
<img src="fotos/<?php echo $tp['emailamigo']."_".$tp['foto']; ?>" width="40" height="40">
</td>
<td>
<p size="10" face="Arial Black"  align="justify"><a href="includes/cambiar.php?email=<?php echo $tp['email'];?>"><php echo $tp['nombre']; ?></a>
<small><?php $date =$tp['fecha']; $sqldate=date(' d  /  M /  Y' , strtotime($date));
$d=date('d', strtotime($date));
$m=date('M', strtotime($date));
$a=date('Y', strtotime($date));
$sqldate2=date('h:i a'  , strtotime($date)); echo " el " .$sqldate. " a las ". $sqldate2; ?></small>
</p>
</td>
</tr>
<tr>
<td colspan="2" style="color:black;background:burlywood;">
<p size="8" face="Arial" align="justify" ><?php echo $tp['texto'];?></p>
<?php
if($tp['imagen']!=''){
	echo "<center><img src='fotos/".$tp['email']."__". $tp['imagen']. "'width='350' height='350'></center>";
}    
if($tp['video']!=''){
	echo "<iframe width='460' height='315' src='//www.youtube.com/embed/".$tp['video']."' frameborder='0' allowfullscreen</iframe>";

}
?>
</td>
</tr>
<tr>
<td align="left" colspan="2" >

<?php
$usuario=$_SESSION['usuario'];
$id=$tp['idpub'];
$l="SELECT * FROM likes WHERE email='$usuario' AND idpub='$id' ";
$ejlike=$conexion->query($l);
$nflike=mysqli_num_rows($ejlike);
$alike=mysqli_fetch_assoc($ejlike);
if($nflike==1){
	if($alike['like']==1){echo "<font color='red'> a ti te gusta</font>";}else{echo "<font color='red'> a ti no te gusta</font>";}

}
if($nflike==0){ ?>
<a href="pinicio.php?like=1&idpub=<?php echo $tp['idpub']; ?>"><?php }
$cuantoslikes="SELECT COUNT(*) as nlikes FROM likes WHERE likes.idpub=$id AND likes.like='1'";
$ejcl=mysqli_query($conexion,$cuantoslikes);
$acl=mysqli_fetch_assoc($ejcl);?>
<img src="img/chat.png" width="15" height="15">
<?php if($nflike==0){ ?></a><?php } 
if($acl['nlikes']>0){ echo "<b> ".$acl['nlikes']."</b>";} 
if($nflike==0){ ?>
<a href="pinicio.php?like=0&idpub=<?php echo $tp['idpub']; ?>"><?php } ?>
<b> <?php echo $tp['numcom']." "; ?>comentarios </b>
<hr>
</td>
</tr>
<tr>
<td aling="right" width="40">
</td>
<td width="360">
<table width="100%"  style="color:black;background:burlywood;">
<?php
$idp=$tp['idpub'];
$ejcoment=mysqli_query($conexion,"SELECT * FROM usuario LEFT JOIN comentarios ON (comentarios.email= usuario.email)
WHERE comentarios.idpub = $id ORDER BY comentarios.fecha ASC");
$nfcoment=mysqli_num_rows($ejcoment);
$acoment=mysqli_fetch_assoc($ejcoment);
if($nfcoment>0){
do{
	?>
	<tr>
	<td valign="top" align="right">
	<!-- //imagen de comentario// -->
	<img src="fotos/<?php echo $acoment['email']."__".$acoment['fotos']; ?>" width="25" height="25">
	</td>
	<td colspan="2">
	<p align="justify" style="font-size:12px" ><a href="includes/cambiar.php?email=<?php echo $acoment['email'];?>">
	<?php echo $acoment['nombre'];?></a>
	<small><?php $date= $acoment['fecha']; $sqldate=date('d / M / Y ',strtotime($date));
			$d=date('d',strtotime($date));
			$d=date('M',strtotime($date));
			$d=date('Y',strtotime($date));
			$sqldate2=date('h:i a',strtotime($date)); echo " el".$sqldate." a las: ".$sqldate2;?></p>
			<p size="8" face="Arial" align="justify"></small><i><?php echo $acoment['texto'];?></i></p>
			</td>

			</tr><?php }while($acoment=mysqli_fetch_assoc($ejcoment)); } ?>
			<tr>

			<td align="right" width="40">
			<!--Foto de comentario -->
			<img src="fotos/ <?php echo $auser['email']."/".$auser['fotos'];?>" width="25" height="25">
			</td>              
	<td valign="bottom" width="320">
	<form name="enviarcomentario" method="POST" action="pinicio.php">
	<textarea name="comen" cols=35 rows=1 placeholder="Escribe un comentario"></textarea>

	    </td>
	    <td valign="bottom">
            <button type="submit"><img src="img/new-message.png" alt=""></button>
	    </td>    
	<input type="hidden" name="idpub" value="<?php echo $tp['idpub'];?>">
	<input type="hidden" name="nc" value="ok">
	</form>
	       </tr>
        </table>
        <hr>
        </td>
    </tr>
    <?php }
    	while($tp=mysqli_fetch_assoc($ejcoment)); 
    	?>
        <tr>
            <td colspan="2" align="center">
            <a href="pinicio.php?aumenta1">MOSTRAR PUBLICACIONES ANTIGUAS</a>
        </td>
        </tr>
        </table>
        </body>
        </html>
 



