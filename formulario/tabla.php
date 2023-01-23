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

        <div class="col-md-7">

            <!-- Inicio alerta -->

            <?php

                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'Rellena') {
                    
                

            ?> 

            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Error!</strong> Rellena todos los campos.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            <?php

                }

            ?> 


            <?php

                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registro registrado en los registros de manera exitosa') {
                


            ?> 

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Registrado!</strong> Se agregaron los datos correctamente.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            <?php

                }

            ?>


            <?php

                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {



            ?> 

            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Error!</strong> Vuelve a intentar.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            <?php

                }

            ?>


            <?php

                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {



            ?> 

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Editado!</strong> Los datos fueron actualizados.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            <?php

            }

            ?>

            <?php

                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {



            ?> 

            <div class="alert alert-warning alert-dismissible fade show" role="alert">

                <strong>Eliminado!</strong> Los datos fueron borrados.

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            <?php

            }

            ?>

            <!-- Fin alerta -->

            <div class="card">

                <div class="card-header">

                        Lista de personal

                </div>

                

                <div class="p-2"> <!-- p4 significa padding 4 que son espacios internos -->

                    <table class="table aling-middle"> <!-- aling-middle para que se alinien los elementos -->
                
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Rol</th>
                                <?php if ($_COOKIE['RolUser'] == 'Administrador') {

                                       echo "<th scope='col' colspan='2'>Opciones</th>";

                                    }
                                ?>    
                            </tr>

                        </thead>

                        <tbody>

                            <!-- Aqui estamos trallendo los valores de la base de datos -->
                            <?php

                                //El foreach en cada iteraci[on le asigna los valores de cada indice a la variable definida para poder accederlos de manera individual.
                                foreach($personal as $dato){

                                

                            ?>

                            <tr>
                                <td scope="row"> <?php echo $dato->codigo?> </td>
                                <td><?php echo $dato->usuario; ?></td>
                                <td><?php echo $dato->contraseña; ?></td>
                                <td><?php echo $dato->rol; ?></td>
                                <!-- La variable codigo que està en el href es para pasar le el valor por la url.-->
                                <?php echo $_GET['resultado']; ?>
                                <?php if ($_COOKIE['RolUser'] == 'Administrador') {

                                        echo "<td> <a class='text-success' href='editar.php?codigo= $dato->codigo '> <i class='bi bi-pencil-square'></i> </a> </td>";
                                        echo "<td> <a onclick='return confirm('¿Quieres eliminar este usuario?')' class='text-danger' href='eliminar.php?codigo= $dato->codigo'> <i class='bi bi-trash-fill'></i> </a> </td>";
                                
                                    }
                                ?>
                            </tr>

                            <?php

                                }

                            ?>

                        </tbody>
                        
                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'template/footer.php' ?> 