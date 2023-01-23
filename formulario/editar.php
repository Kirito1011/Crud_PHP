<?php include 'template/header.php' ?>

<?php

    //isset significa si exite y _GET en una variable vìa get, entonces en if tenemos si existe una variable vìa get haga lo siguiente.
    //!isset significa si no exixte.
    if(!isset($_GET['codigo'])) {
            
        header('Location: tabla.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';

    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from personal where codigo = ?;");
    $sentencia->execute([$codigo]);
    $personal = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);

?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">

                    Editar datos:

                </div>

                <form class="p-4" method="POST" action="editarProceso.php">

                    <div class="mb-3">

                        <label class="form-label">Usuario: </label>

                        <input type="text" class="form-control" name="txtUsuario" required 

                        value="<?php echo $personal->usuario; ?>">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Contraseña: </label>

                        <input type="text" class="form-control" name="txtContraseña" autofocus required

                        value="<?php echo $personal->contraseña; ?>">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Rol: </label>

                        <input type="text" class="form-control" name="txtRol" autofocus required

                        value="<?php echo $personal->rol; ?>">

                    </div>

                    <div class="d-grid">

                        <input type="hidden" name="codigo" value="<?php echo $personal->codigo; ?>">

                        <input type="submit" class="btn btn-primary" value="Editar">

                    </div>

                </form>

            </div>

        </div>

    </div>
    
</div>

<?php include 'template/footer.php' ?>