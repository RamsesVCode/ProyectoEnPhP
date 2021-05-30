<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/lateral.php');?>
<?php require_once('includes/conexion.php');?>

<?php $entrada = getEntrada($db,$_GET['id']);?>
    <div id="principal">
        <h1><?=$entrada['TITULO']?></h1>
        <p><?php echo $entrada['NOMBRE'].' | '.$entrada['nombre'];?></p>
        <p><?=$entrada['DESCRIPCION'];?></p>
        <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['NOMBRE'] == $entrada['nombre']): ?>
        <a href="cambiar-entrada.php?id=<?=$_GET['id']?>" class="boton boton-verde">Modificar entrada </a>
        <a href="borrar-entrada.php?id=<?=$_GET['id']?>" class="boton boton-rojo">Eliminar entrada </a>
        <?php endif;?>
    </div>
<?php require_once('includes/pie.php');?>