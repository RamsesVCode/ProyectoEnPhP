<?php if(!isset($_POST['busqueda']) || empty($_POST['busqueda']))
        header('Location:index.php');
?>
<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/lateral.php');?>
    <!--Caja Principal-->
    <div id="principal">
        <h1>Resultados para "<?=$_POST['busqueda'];?>"</h1>
        <article class="entrada">
            <?php $entradas = getEntradas($db,null,null,$_POST['busqueda']);?>
            <?php if(!empty($entradas)):?>
            <?php while($entrada = mysqli_fetch_assoc($entradas)):?>
                <a href="entrada.php?id=<?=$entrada['ID']?>">
                    <h2><?=$entrada['TITULO']?></h2>
                </a>
                <span class="fecha">
                    <?php echo $entrada['NOMBRE'].' | '.$entrada['FECHA']?>
                </span>
                <p>
                    <?php echo substr($entrada['DESCRIPCION'],0,100).'...';?>
                </p>
            <?php endwhile;?>
            <?php else:?>
                <div class="alerta">No hay resultado para "<?=$_POST['busqueda'];?>"</div> 
            <?php endif;?>
        </article>
    </div>
<?php require_once('includes/pie.php');?>