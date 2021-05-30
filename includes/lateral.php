<aside id="sidebar">
        <div id="login" class="bloque">
            <h3>Buscar</h3>
            <form action="busqueda.php" method="POST">
                <input type="text" name="busqueda" autocomplete="off"/>
                <input type="submit" value="Buscar"/>
            </form>
        </div>
        <?php if(isset($_SESSION['usuario'])):?>
            <div class="bloque">
                <?php echo 'Bienvenido '.$_SESSION['usuario']['NOMBRE'].' '.$_SESSION['usuario']['APELLIDOS']; ?>
                <a href="crear-entradas.php" class="boton boton-verde">Crear entradas</a>
                <a href="crear-categoria.php" class="boton boton-crimson">Crear categoria</a>
                <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
                <a href="cerrar.php" class="boton boton-rojo">Cerrar sesión</a>
            </div>
        <?php else:?>
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="text" name="email" autocomplete="off"/>
                <label for="password">Contraseña</label>
                <input type="password" name="password"/>
                <input type="submit" name="submit" value="Entrar" autocomplete="off"/>
            </form>
        </div>
        <div id="register" class="bloque">
            <?php if(isset($_SESSION['correcta'])):?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['correcta']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])):?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif;?>
            <h3>Registrate</h3>
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : '';?>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') : '';?>
                <label for="email">Email</label>
                <input type="text" name="email" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : '';?>
                <label for="password">Contraseña</label>
                <input type="password" name="password" autocomplete="off"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password') : '';?>
                <input type="submit" name="submit" value="Registrar"/>
            </form>
            <?php borrarError();?>
        </div>
        <?php endif;?>
</aside>