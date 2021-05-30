<?php require_once('includes/cabecera.php');?>
    <!--Sidebar-->
<?php require_once('includes/lateral.php');?>
    <!--Caja Principal-->
    <div id="principal">
        <h1>Ultimas entradas</h1>
        <article class="entrada">
            <?php $entradas = getEntradas($db,4);?>
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
        </article>
        <div id="ver-todas">
            <a href="entradas.php">Ver todas las entradas</a>
        </div>
    </div><!--Fin principal-->
    <div class="clearfix"></div>
    </div>
    <!--Pie de pagina-->
<?php require_once('includes/pie.php');?>
</body>
</html>