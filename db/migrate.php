<?php
require('../config/database.php');
    $conexion = (mysql_connect($GLOBALS['db_host'],$GLOBALS['db_user'],$GLOBALS['db_password'])) or die(mysql_error());
    $sql = "CREATE DATABASE IF NOT EXISTS ".$GLOBALS['db_name'];
    if (mysql_query($sql, $conexion)) 
    {
        echo "La base de datos ".$GLOBALS['db_name']." fue creada satisfactoriamente<br/>";
    } 
    else 
    {
        echo 'Error al crear la base de datos: ' . mysql_error() . "<br/>";
    }
    $migrations = scandir('./migrations');
    mysql_select_db($GLOBALS['db_name'],$conexion) or die(mysql_error());
    foreach ($migrations as $migration) 
    {   
        if($migration!=="." && $migration!=="..")
        {
            $query = file_get_contents ("migrations/".$migration); 
            if (mysql_query($query, $conexion)) 
            {
                echo "La migracion ".$migration." fue ejecutada satisfactoriamente<br/>";
            } 
            else 
            {
                echo "Error al ejecutar la migracion".$migration. mysql_error() . "<br/>";
            }
        }
    }
    mysql_close($conexion);
?>
