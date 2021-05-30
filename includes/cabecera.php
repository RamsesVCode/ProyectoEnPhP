<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>
<?php require_once('includes/helpers.php');?>
<?php require_once('includes/conexion.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/estilos.css"/>
    <title>Blog de Video Juegos</title>
</head>
<body>
    <!--Cabecera-->
    <header id="cabecera">
        <!--Logo-->
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!--Menu-->
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <?php $categorias = getCategorias($db)?>
                <?php if(!empty($categorias)):?>
                    <?php while($categoria = mysqli_fetch_assoc($categorias)): ?>
                        <li><a href="categoria.php?id=<?=$categoria['ID']?>"><?=$categoria['NOMBRE'];?></a></li>
                    <?php endwhile;?>
                <?php endif;?>
                <li><a href="index.php">Sobre Mi</a></li>
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="contenedor">