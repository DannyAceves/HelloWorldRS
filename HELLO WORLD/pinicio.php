<?php
include('includes/conectar.php');
include('includes/checarycerrar.php');
?>
<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8">
<meta http.equiv="content.Type" content="text/html; charset=utf.B" />
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet" type="text/css" media="screen" href="includes/menus.css" />
<title>Hello World</title>
<link href="includes/css/formularios.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<header class="header">
    <div class="wrapper">
       <div class="logo">Hello World</div>
        <nav class="session">
		  <a href=""><?php include("includes/session.php");?></a>
		  <a href="pinicio.php">Inicio</a>
		  <a href="editar.php?">Editar</a>  
          <a href='pinicio.php?cerrar=ok' >Cerrar Session</a>   
        </nav>
    </div>    
</header>	

<table height="900" width="100%" >
    <tr>
        <td width="25%" height="900" valing="top" halign="center" >
                <div width="400px"></div>
        </td>
        <td width="60%" height="900" valing="top" halign="left" >
            <?php include("includes/publicacionesmuro.php");?>
        </td>
        <td width="30%" height="900" valing="top" halign="left" >
            <?php include("includes/solicitudes.php");?>
        </td>
    </tr>
</table>
</center>
</body>
</html>
