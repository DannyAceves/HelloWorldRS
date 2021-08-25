<?php
include("includes/conectar.php);
include("includes/checarycerrar.php);

if(isset($_SESSION[´usuario´]) && isset($_GET[´idpub´]) && isset($_GET[´like´]) ){
	$email=$SESSION[´usuario´];
$id=$_GET(´idpub´);
$like=$_GET(´like´);
 	$insertar="INSERT INTO likes VALUES(´$email´,$id,´$like´)";
	$ejecutar=mysql_query($insertar);
	hedaer("Location: pinicio.php");
}

?>

<!DOCTYPE html PUBLIC".//W3C//DDT XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1.transitional.dtd">
	<html xmlns="http://www.w3.org/199/xhtml">
	<head>
	<body background="img/SesionWeb.jpg">
		<meta http-equiv-"Content-Type" content="text/html; charset-utf-8" />
		<link rel="stylesheet" type="text/css" media="screen" href="includes/menus.css" />
		<title>RELATIONS</title>
			<link href="includes/css/formularios.css" rel="stylesheet" type="text/css">
			<script type="text/javascript">
$(document).ready(function(){

$(".busca").keyup(function()
{
var texto = $(this).val();
var dataString = 'palabra='+ texto;
if(texto=='')
{
}
else 
}
$.ajax({
type:"POST",
url: "includes/search.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show(); 
	}	
});
} return false;
});
});
jQuery(function($){
	$("#caja_busqueda").Watermark("Buscar amigos...");
	});
</script>

	</head>
	<body>
		<center>
		