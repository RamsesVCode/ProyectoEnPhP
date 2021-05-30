<?php require_once('includes/cabecera.php');?>
    <!--Sidebar-->
<?php require_once('includes/lateral.php');?>
    <!--Caja Principal-->
    <div id="principal">
        <h1>Mis datos</h1>
        <?php if(isset($_SESSION['correcta'])):?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['correcta']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])):?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif;?>
            <form action="actualizar-usuario.php" method="POST">
                <label for="nombre">Nombre</label><br/>
                <input type="text" name="nombre" value="<?=$_SESSION['usuario']['NOMBRE']?>"autocomplete="off"/><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : '';?>
                <label for="apellidos">Apellidos</label><br/>
                <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['APELLIDOS']?>"autocomplete="off"/><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') : '';?>
                <label for="email">Email</label><br/>
                <input type="text" name="email" value="<?=$_SESSION['usuario']['EMAIL']?>" autocomplete="off"/><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : '';?>
                <input type="submit" name="submit" value="Actualizar"/>
            </form>
            <?php borrarError();?>
    </div>
<?php require_once('includes/pie.php');?>
</body>
</html>