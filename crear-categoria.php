<?php require_once('includes/redireccion.php')?>
<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/lateral.php');?>    
<div id="principal">
    <h1>Crear categoria</h1>
    <form action="guardar-categoria.php" method="POST"><br>
        <label for="nombre">Nombre de la categoria</label><br>
        <input type="text" name="nombre" autocomplete="off"/><br>
        <input type="submit" value="Guardar">
    </form>
</div>
<?php require_once('includes/pie.php');?>