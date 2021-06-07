<?php

include("db.php");

if(isset($_GET['id'])){ //Comprueba si llego un id

    $id = $_GET['id'];

    $consulta_selecciona = "Select * from tareas where id=$id";
    $res_sel = mysqli_query($conn,$consulta_selecciona);

    if(mysqli_num_rows($res_sel) == 1){ //Se fija cuantos datos devuelve la consulta de seleccion
       $row = mysqli_fetch_array($res_sel);
       $titulo = $row['titulo'];
       $descripcion = $row['descripcion'];
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo']; 
        $descripcion = $_POST['descripcion'];  

        $consulta_edita = "Update tareas set titulo='$titulo', descripcion='$descripcion' where id=$id";
        $res_edit = mysqli_query($conn,$consulta_edita);

        if(!$res_edit){
            die("Consulta no editada");
        }

        $_SESSION['mensaje'] = "Se edito el registro exitosamente";
        $_SESSION['tipo_mensaje'] = "info";
    
        header("Location: index.php");
    } 

   
}
?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?= $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>"
                        class="form-control" placeholder="Actualiza titulo">
                    </div>
                    <br>
                    <div class="form-group">
                         <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion"><?php  echo $descripcion ?></textarea>
                    </div>
                    <br>
                    <button class="btn btn-success" name="actualizar">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>