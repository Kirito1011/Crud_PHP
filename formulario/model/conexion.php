<?php 

  $contraseña = "root";
  $usuario = "";
  $nombre_bd = "inicio";

  try {
    //PDO es una clase y estoy creando una instancia que se llama bd
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$nombre_bd,
		$usuario,
		$contraseña,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
  } catch (Exception $e) {

	echo "Problema con la conexion: ".$e->getMessage();

  }

?>