<?php

include("db.php");

if(isset($_POST['guardar'])){ // el nombre dentro del las llaves tiene que ser igual al nombre del boton mediante el atributo name que en esta caso se llama guardar
    $titulo = $_POST['titulo'];
    $desc = $_POST['descripcion'];

    $consulta = "Insert into tareas(titulo,descripcion) values ('$titulo','$desc')";
    $result =  mysqli_query($conn,$consulta); //Este metodo recibe la cadena de conexion que estamos importando de db.php mas arriba y la consulta que se quiera hacer

    if(!$result){
        die("No se pudo ingresar el registro"); //Die tiene un efecto similar al return solo que aca termina el programa y puedo ingresar un mensaje 
    }

    $_SESSION['mensaje'] = "Tarea guardada exitosamente";
    $_SESSION['tipo_mensaje'] = "success"; //Guardamos el tipo de mensaje para despues con Bootstrap decirle el color del mensaje.

    header("Location: index.php"); //Una vez que los datos son ingresados en la DB lo redireccionamos a index.php
}

?>