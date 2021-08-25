<?php
include('includes/conectar.php');
include('includes/checarycerrar.php');
?>
<!DOCTYPE>
<html>
<head>
<meta http.equiv="content.Type" content="text/html; charset=utf.B" />
<link rel="stylesheet" type="text/css" media="screen" href="includes/menus.css" />
<title>blog </title>
</head>
<body>
<center>
<table height="900" width="100%" >
<tr >
<td width="10%" height="70">
</td>
<td width="60%" height="70">
<h1>
Blog
</h1>
</td>
<td width="30%" height="70" align="right" >
<?php include("includes/session.php");?>
</td>
</tr>
<tr>
<td width="10%" height="900" valing="top" halign="center" >
<?php include("includes/menuamigo.php");?>
<?php include("includes/sessionamigo.php");?>
</td>
<td width="60%" height="900" valing="top" halign="left" >
<?php include("includes/publicacionesmuroamigo.php");?>
</td>
<td width="30%" height="900" valing="top" halign="left" >
<?php include("includes/solicitudes.php");?>
</td>
</tr>
</table>
</center>
</body>
</html>


