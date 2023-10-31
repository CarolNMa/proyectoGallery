<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gallery";
    
    // Crear conexion
    $conex = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM categorias WHERE idCategoria=$id";
    $conex->query($sql);
    }

    header("location: /gallery/crudcate/index.php");
    exit;
?>