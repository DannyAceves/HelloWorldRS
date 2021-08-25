<?php
include('includes/conectar.php');
include('includes/checarycerrar.php');
//include('includes/time_stamp.php');
if(isset($_SESSION['usuario']) && isset($_GET['idpub']) && isset($_GET['like']) ){
	$email=$_SESSION['usuario'];
	$id=$_GET('idpub');
	$like=$_GET('like');
 	$insertar="INSERT INTO likes VALUES('$email',$id,'$like')";
	$ejecutar=$conexion->query($insertar);
	header("Location: pinicio.php");
}
?>

<!DOCTYPE>
	<html xmlns="http://www.w3.org/199/xhtml">
	<head>
	    <meta charset="UTF-8">
		<meta http-equiv-"Content-Type" content="text/html; charset-utf-8" />
		<link rel="stylesheet" href="css/body.css">
		<title>Hello World</title>
		<link rel="stylesheet" href="">
	</head>
	<body>
<center>
<header class="header">
    <div class="wrapper">
       <div class="logo">Osking</div>
        <nav class="session">
		  <a href=""><?php include("includes/session.php");?></a>
		  <a href="pinicio.php">Inicio</a>
		  <a href="editar.php?">Editar</a>  
          <a href='pinicio.php?cerrar=ok' >Cerrar Session</a>   
        </nav>
    </div>    
</header>	
			
	<table height="900" width="100%">
	</tr>
    <tr>
        <td width="40%" height="900" valign="top" haling="center">
                            		
        </td>
        <td width="60%" height="900" valign="top" haling="left">
            <?php include("includes/editar.php");?>
        </td>
        <td width="30%" height="900" valign="top" haling="left">
	    
    <form action="pnicio.php" method="get">
        <div style="width: 350px; padding-left: 3px; ">
            <input  type="hidden" required>
        </div>
        <div id="display"></div>
    </form>
                    </td>
				</tr>

    </table>
    
		 </center>
		 <footer>
		 	<h2>
		 		
		 	</h2>
		 </footer>
		 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		 <script type="text/javascript" src="js/script.js"></script>
		 <script type="text/javascript" src="js/jquery.oembed.js"></script>
		 <script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
		 
</body>
    </html>