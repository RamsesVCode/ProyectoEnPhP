<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/lateral.php');?>
<?php require_once('includes/redireccion.php');?>
<?php require_once('includes/conexion.php');?>

    <div id="principal">
        <h1>Crear entradas</h1>
        <form action="guardar-entradas.php" method="POST">
        <!--titulo-->
        <label for="titulo">Titulo:</label><br/>
        <input type="text" name="titulo"><br>
        <!--descripcion-->
        <label for="descripcion">Descripcion:</label><br/>
        <textarea name="descripcion"></textarea><br/>
        <!--categoria-->
        <label for="categoria"></label>
        <select name="categoria">
            <?php $categorias = getCategorias($db);?>
            <?php 
                if(!empty($categorias)): 
                while($categoria = mysqli_fetch_assoc($categorias)):    
            ?>
                <option value="<?=$categoria['ID']?>">
                    <?=$categoria['NOMBRE']?>
                </option>
            <?php endwhile;?>
            <?php endif; ?> 
        </select><br/>
        <input type="submit" value="Guardar">
        </form>
    </div>
<?php require_once('includes/pie.php');?>
