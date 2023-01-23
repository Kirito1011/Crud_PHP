<?php include 'template/header.php' ?>

<?php

    include_once "model/conexion.php";

    //llamo al objeto bd y accedo a uno de sus metodos, el cual es al consulta.
    $sentencia = $bd -> query("select * from personal");

    //En persona voy a guardar todos los valores de la base de datos, dentro de PDO le digo que me de un formato adecuado para que pueda leer se.
    //fetchall me recoje los datos de la base de datos
    $personal = $sentencia->fetchAll(PDO::FETCH_OBJ); 

    //print_r($persona);

?>

<div class="container mt-5"> <!-- mt significa margin-top -->

    <div class="row justify-content-center">

        <div class="cold-md4 pt-5">

            <div class="card">

                <div class="card-header">
                    
                    Inicia Sesión:
                </div>

                <form class="p-4" method="POST" action="inicio.php">

                    <div class="mb-3"> <!-- mb-3 es margin bottom 3 -->

                        <label class="form-label">Usuario: </label>
                        <!-- autofocus es que una parte del formulario debe tener foco para ingresar la info -->
                        <input type="text" class="form-control" name="txtUsuario" autofocus required>    

                    </div> 

                    <div class="mb-3"> <!-- mb-3 es margin bottom 3 -->

                        <label class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="txtContraseña" autofocus required>    

                    </div>

                    <div class="mb-3">

                    ¿Ya estas registrado? <a href="registro.php">Registrarse</a>

                    </div>
                    
                    <!-- d-grid significa display grid y grid es para que ocupe todo el tamaño -->
                    <div class="d-grid"> 

                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Iniciar Sesión">

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php
    /*
    session_start();
    echo $_SESSION['Guacamole'];
    */
//sirve para imprimir cualquier variable
    //var_dump( $persona)

?> 

<?php include 'template/footer.php' ?>  