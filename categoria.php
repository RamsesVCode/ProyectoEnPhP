<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/lateral.php');?>
<?php $categoria =getCategoria($db,$_GET['id']); 
    if(!isset($categoria['ID']))
        header('Location:index.php');
?>
    <div id="principal">
        <h1>Entradas de <?=$categoria['NOMBRE']?></h1>
        <article class="entrada">
            <?php $entradas = getEntradas($db,null,$_GET['id']);?>
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
            <div class="alerta">No hay entradas en esta categoria</div>
            <?php endif;?>
        </article>
    </div>
    <div class="clearfix"></div>
    </div>
<?php require_once('includes/pie.php');?>
</body>
</html>