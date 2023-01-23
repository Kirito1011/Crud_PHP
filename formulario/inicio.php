<?php

    /*if (!isset($_POST["oculto"]) || !isset($_POST["txtUsuario"]) || !isset($_POST["txtContraseña"]) || !isset($_POST["txtRol"])) {

        header('Location: index.php? mensaje=Rellena');
        exit();
    
    }*/

    include_once 'model/conexion.php';

    $usuario = $_POST["txtUsuario"];
    $contraseña = $_POST["txtContraseña"];

    $sentencia = $bd->prepare("SELECT * FROM persona where usuario = ? AND contraseña = ?");
    $resultado = $sentencia->execute([$usuario, $contraseña]);
    //PDO::FETCH_OBJ devuelve un objeto anónimo con nombres de propiedades que se corresponden a los nombres de las columnas devueltas en el conjunto de resultados.
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    //En el primera estancía se crea el nombre de la cookie, en segunda instancia se le da el valos de la cookie, el cual es que queremos que nos muestre y en tercera instancia es el tiempo
    setcookie("RolUser", $datos[0]->rol, time()+3600*5);
    //Unset es para borrar nuestra COOKIE
    //unset($_COOKIE["RolUser"]);

    //Las variables de sesion sirven para acceder a datos desde cualquier lugar de nuestra aplicación
    /*
    session_start();
    $_SESSION['Guacamole'] = "Aguacate uwu";
    */
    

    if ($resultado == TRUE) {
        
        header("Location: tabla.php?rol=$resultado");

    } else {
        
        header('Location: index.php? mensaje=inicio de sesión invalida');
        exit();

    }

?>