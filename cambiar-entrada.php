<?php require_once('includes/cabecera.php');?>
<?php require_once('includes/lateral.php');?>
<?php require_once('includes/helpers.php');?>
    <div id="principal">
    <h1>Modificar entrada</h1>
        <form action="guardar-entradas.php?cambiar=<?=$_GET['id'];?>" method="POST">
        <?php $entrada = getEntrada($db,$_GET['id']);?>
        <!--titulo-->
        <label for="titulo">Titulo:</label><br/>
        <input type="text" name="titulo" value="<?=$entrada['TITULO'];?>"><br>
        <!--descripcion-->
        <label for="descripcion">Descripcion:</label><br/>
        <textarea name="descripcion"><?=$entrada['DESCRIPCION'];?></textarea><br/>
        <!--categoria-->
        <label for="categoria"></label>
        <select name="categoria">
            <?php $categorias = getCategorias($db);?>
            <?php 
                if(!empty($categorias)): 
                while($categoria = mysqli_fetch_assoc($categorias)):    
            ?>
                <option value="<?=$categoria['ID']?>" 
                    <?=($categoria['ID']==$entrada['CATEGORIA_ID']) ? "selected=selected":'';?>
                >
                    <?=$categoria['NOMBRE']?>
                </option>
            <?php endwhile;?>
            <?php endif; ?>
        </select><br/>
        <input type="submit" value="Guardar">
        </form>
    </div>
<?php require_once('includes/pie.php');?>
