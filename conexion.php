<?php

    // Acceso a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $password = "sergio";
    $db = "notas_php";

    $dsn = "mysql:dbname=$db;host=$servidor";
    
    try {
       $conexion = new PDO($dsn, $usuario, $password);

       if ($conexion) {
        echo "Conectado a la base de datos correctamente";
       }
       
    } catch (PDOException $e) {
        echo "La conexion ha fallado: " . $e->getMessage();
    }

?>