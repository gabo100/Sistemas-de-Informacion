<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Conectarse(){
    
    $con = @mysql_connect("localhost","root","");
    if (!$con){
        die("Error al intentar conectarse con el servidor MySQL. ".mysql_error()) ;
        exit(); 
    }
    $db_select = mysql_select_db("proyecto", $con);
    if (!$db_select){
        die("No se pudo conectar con la Base de datos. ".mysql_error()) ;
        exit();
    }
    return $con;
}

?>