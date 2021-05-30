<?php
    require_once('includes/conexion.php');
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION['usuario']) && isset($_GET['id'])){
        $entrada_id = $_GET['id'];
        $sql = "DELETE FROM entradas WHERE ID=$entrada_id";
        $query = mysqli_query($db,$sql);
    }
    header('Location:index.php');
?>