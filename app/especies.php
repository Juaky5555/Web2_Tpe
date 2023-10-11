<?php
require_once './app/db.php';

function mostrarEspecies() {
    require 'templates/header.phtml';

    $especies = obtenerEspecies();

    require 'templates/categorias_especies.phtml';
    ?>

    <ul class="list-group">
    <?php foreach($especies as $especie) { ?>
        <lo class="list-group-categoria categoria-task">
            <div>
                <h5><b><a href="<?php echo $especie->nombre ?>">Especie: <?php echo $especie->nombre ?></a></b></h5> 
                <h6>Descripcion:  <?php echo $especie->especie ?></h6>
            </div>
            <div class="actions">
                <a href="individuo/<?php echo $individuo->id?>" type="button" class='btn btn-success ml-auto'>Ver mas</a> 
                <a href="eliminar/<?php echo $individuo->id ?>" type="button" class='btn btn-danger ml-auto'>Borrar</a> 
                <a href="mostrarParaModificar/<?php echo $individuo->id ?>" type="button" class='btn btn-secondary ml-auto'>Modificar</a> 
                <?php } ?>
            </div>
        </lo>
<?php 
    require 'templates/footer.phtml';
}
?>