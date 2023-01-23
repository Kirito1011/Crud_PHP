<?php

    if (!isset($_GET['codigo'])) {
        
        header('Location: tabla.php?mensaje=error');
        exit();

    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];
    
    $sentencia = $bd->prepare("DELETE FROM personal where codigo = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado == TRUE) {
        
        header('Location: tabla.php?mensaje=eliminado');

    } else {
        
        header('Location: tabla.php?mensaje=error');

    }
    

?>