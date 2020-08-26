<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php
$conexion = mysqli_connect("localhost", "root", "") or  die("no conectado </br>");

mysqli_set_charset($conexion, 'utf8');

mysqli_select_db($conexion, "gestion_bodega") or die("Base de Datos no encontrada </br>");

?>