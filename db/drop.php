<?php
require('../config/database.php');
    $conexion = (mysql_connect($GLOBALS['db_host'],$GLOBALS['db_user'],$GLOBALS['db_password'])) or die(mysql_error());
    $sql = "DROP DATABASE IF EXISTS ".$GLOBALS['db_name'];
    if (mysql_query($sql, $conexion)) 
    {
        echo "La base de datos ".$GLOBALS['db_name']." fue ELIMINADA satisfactoriamente<br/>";
    } 
    else 
    {
        echo 'Error al ELIMINAR la base de datos: ' . mysql_error() . "<br/>";
    }
?>
