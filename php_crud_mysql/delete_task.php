<?php 

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $consulta = "Delete from tareas where id=$id";
    $result = mysqli_query($conn,$consulta);

    if(!$result){
        die("Consulta fallida");
    }

    $_SESSION['mensaje'] = "Se elimino el registro exitosamente";
    $_SESSION['tipo_mensaje'] = "danger";

    header("Location: index.php");
}

?>