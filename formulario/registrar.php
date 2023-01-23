<?php

    //POST es una variable super global que captura los datos de los formularios que han sido enviados por POST. 
    //print_r($_POST);

    //Empty es una función la cual va a devolver verdadero la variable que se pasa como argumento si está vacía.
    if (empty($_POST["oculto"]) || empty($_POST["txtUsuario"]) || empty($_POST["txtContraseña"]) || empty($_POST["txtRol"])) {

        header('Location: registro.php? mensaje=Rellena');
        exit();
        
    }

    //El include_once es para incluir una sola vez
    include_once 'model/conexion.php';

    $usuario = $_POST["txtUsuario"];
    $contraseña = $_POST["txtContraseña"];
    $rol = $_POST["txtRol"];

    $sentencia = $bd->prepare("INSERT INTO personal(usuario, contraseña, rol) VALUES(?, ?, ?);");
    $resultado = $sentencia->execute([$usuario, $contraseña, $rol]);
    
    if ($resultado == TRUE) {
        
        header('Location: inicio.php? mensaje=registro registrado en los registros de manera exitosa');

    } else {
        
        header('Location: inicio.php? mensaje=registro no registrado en los registros');
        exit();

    }


    

?>