<?php
include('includes/conectar.php');
if(isset($_REQUEST['nombre']) && isset($_REQUEST['pass'])){
	$e=$_REQUEST['email'];
    $ps=$_REQUEST['pass'];
	$n=$_REQUEST['nombre'];
	$fe=$_REQUEST['fecha'];
	$p=$_FILES['foto']['name'];
    $fa=$_REQUEST['fa'];
    $foto="";
    if($p!=""){
        $foto=$p;move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/".$e."_".$p);
        }
    else{
        $foto=$fa;
    }
    $sql="UPDATE usuario SET nombre='$n', fechanac='$fe' ,pass='$ps', foto='$foto' WHERE email='".$_SESSION['usuario']."'";
    $conexion->query($sql);
    header('Location:muro.php');
}
?>


<style>
        *{
            transition: 5s all ease;
        }
        h1{
            font-size: 50px;
            color:crimson;
            
        }
        label{
            font-size: 30px;
            color: darkseagreen;
        }
        
        img{
            margin-left: 10%;
            border-radius:10%; 
        }
        img:hover{
            transform: rotateY(720deg);
            transition: 5s all ease;
            border-radius:20%; 
        }
        input{
            text-align: center;
            height: 30px;
            width: 400px;
            background:linear-gradient(#FFDA53,#FFB948);
            border: 0;
            color: brown;
            font-size: 15px;
            opacity: 0.8;
            cursor: pointer;
            border-radius: 10px;
            margin-bottom: 0;
        }
        input:hover{
            opacity: 1;
        }
        input:active{
            transform: scale(0.95);
        }
        #p{
            height: 35px;
            width: 300px;
            background:linear-gradient(#FFDA53,#FFB948);
            border: 0;
            color: brown;
            opacity: 0.8;
            cursor: pointer;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 0;
        }
        #p:hover{
            opacity: 1;
        }
        #guardar{
            height: 30px;
            width: 200px;
            background:chartreuse;
            color:crimson;
            opacity: 0.8;
            cursor:pointer;
            border-radius: 12px;
            margin-bottom:0;
        }
        #guardar:hover{
            opacity: 1.1;
        }
            #guardar:active{
            transform: scale(0.1);
            opacity: 1.5;
        }
    
    </style>
    
<form action="editar.php" method="post" enctype="multipart/form-data">	
<h1>EDITAR PERFIL</h1>
<?php echo "<img src='fotos/".$_SESSION['usuario'].
		"_".$array['foto']."' width='300' heigth='300'>"?><br><br>
<input type="hidden" name="email" value="<?php echo $array["email"];?>"required>
<p>Nombre</p>
<input type="text" name="nombre" value="<?php echo $array["nombre"]?>" required><br><br>
<p>Nueva Password</p>
<input type="password" name="pass" value="<?php echo $array["pass"]?>" required><br><br>
<p> Fecha de Nacimiento
</p>
<input	type="date" name="fecha" value="<?php echo $array["fechanac"]?>" required><br>
<p> Fotografía
</p>
<input type="file" name="foto" value="<?php echo $array["foto"]?>"><br>
<br>
<br>
<input id="R" type="submit" value="Guardar">
</form>
