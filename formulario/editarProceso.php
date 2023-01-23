<?php

    print_r($_POST);

    if (!isset($_POST['codigo'])) {
        
        header('Location: index.php?mensaje=error');

    }

    include 'model/conexion.php';

    $codigo = $_POST['codigo'];
    $usuario = $_POST['txtUsuario'];
    $contraseña = $_POST['txtContraseña'];
    $rol = $_POST['txtRol'];

    $sentencia = $bd->prepare("UPDATE personal SET usuario = ?, contraseña = ?, rol = ? where codigo = ?;");
    $resultado = $sentencia->execute([$usuario, $contraseña, $rol, $codigo]);

    if ($resultado == TRUE) {
        
        header('Location: tabla.php?mensaje=editado');

    } else {
        
        header('Location: tabla.php?mensaje=error');
        exit();
    }
    

?>