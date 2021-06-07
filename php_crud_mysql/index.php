<!-- Apenas comience la pagina se conecta a la base de datos -->
<?php include("db.php"); ?>

<!-- Entra a la carpeta includes y carga el codigo del header -->
<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
        
            <?php if(isset($_SESSION['mensaje'])){ ?>

                    <div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php session_unset(); } ?> <!-- Lo que hace es limpiar los datos que se encuentran en session -->

            <div class="card card-body">    
                <form action="save_task.php" method="post">
                    <div class="form-group"> <!-- Los asgrupa de una manera mas bonita -->
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" autofocus> <!-- El atributo next es importante ya que despues php lo recibe de esa manera -->
                     </div>
                     <br> <!-- Esto es provisional no encontre como darle un espacio entre el input y textarea -->
                    <div class="form-group">
                         <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion"></textarea>
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">  <!-- btn-block para que ocupe todo el ancho del form -->
                    </div>
              </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de Creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $consulta = "Select * From tareas";
                    $resultado_tareas = mysqli_query($conn,$consulta);
                    while($row = mysqli_fetch_array($resultado_tareas)){ ?>
                        <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['fecha_creacion'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                   
                   <?php } ?>

                </tbody>
                </table>

    
        </div>
    </div>
</div>

<!-- Pasa lo mismo que con el header solamente que footer.php tiene el cierre del html -->
<?php include("includes/footer.php"); ?>