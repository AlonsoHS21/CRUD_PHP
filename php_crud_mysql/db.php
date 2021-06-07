


<?php

//Este apartado es el encargado de mantener todo el codigo relacionado con la conexion
// entre php y mysql

//Doy inicio a una session aca porque es lo primero que carga la pagina
session_start(); //Dentro de la session podemos empezar a guardar datos

//Conexion a Mysql, tenemos que pasarle los parametros de MySql
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
);

//Podemos comprobar si se pudo conectar a la DB
/*
if(isset($conn)){
    echo "DB conectada";
}
*/



?>