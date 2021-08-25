<?php
$server=""; //direccion de servidor
$user=""; //usuario en servidor
$pass=""; //contraseña en servidor
$bd=""; //base de datos del servidor
$conexion=mysql_connect($server,$user,$pass);
mysql_select_db($bd);

?>