<?php

    // Acceso a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $password = "sergio";
    $db = "notas_php";

    $dsn = "mysql:dbname=$db;host=$servidor";
    
    try {
       $conn = new PDO($dsn, $usuario, $password);
       
    } catch (PDOException $e) {
        echo "La conexion ha fallado: " . $e->getMessage();
    }

?>