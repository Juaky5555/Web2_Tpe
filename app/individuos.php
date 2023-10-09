<?php
require_once './app/db.php';

function mostrarIndividuos() {
    require 'templates/header.phtml';

    $individuos = obtenerIndividuos();

    require 'templates/form_subida.phtml';
    ?>

    <ul class="list-group">
    <?php foreach($individuos as $individuo) { ?>
        <li class="list-group-item item-task">
            <div>
                <h5><b>Nombre: <?php echo $individuo->nombre ?></b></h5> 
                <h6>Especie: <?php echo $individuo->especie ?></h6>
                <h6>Color: <?php echo $individuo->color ?></h6>
                <h6>Edad (años): <?php echo $individuo->edad ?></h6>
            </div>
            <div class="actions">
                <a href="individuo/<?php echo $individuo->id?>" type="button" class='btn btn-success ml-auto'>Ver mas</a> 
                <a href="eliminar/<?php echo $individuo->id ?>" type="button" class='btn btn-danger ml-auto'>Borrar</a> 
                <a href="mostrarParaModificar/<?php echo $individuo->id ?>" type="button" class='btn btn-secondary ml-auto'>modificar</a> 
                <?php } ?>
            </div>
        </li>
<?php 
    require 'templates/footer.phtml';
}
?>
    </ul>
<?php

function añadirIndividuo() {
    // ACA HABRIA QUE HACER UNA VALIDACION DE LOS DATOS, PARA CHEQUEAR QUE LOS CAMPOS NO VENGAN VACIOS O CON DATOS ERRONEOS.
    $nombre = $_POST['nombre'];
    $fk_id_especie = $_POST['especie'];
    $raza = $_POST['raza'];
    $edad = $_POST['edad'];
    $color = $_POST['color'];
    $personalidad = $_POST['personalidad'];

    $id = insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $fk_id_especie);

    if ($id) {
        header('Location: ' . BASE_URL);
    } else {
        echo "Error al insertar al individuo";
    }
}

function eliminarIndividuo($id) {
    borrarIndividuo($id);
    header('Location: ' . BASE_URL);
}


function mostrarIndividuoEnDetalle($id) {
    include_once 'templates/header.phtml';
    $animal = obtenerIndividuoPorID($id);
    ?>

    <main class="container mt-5">
    <section>
        <h1 class="mb-5">Nombre: <?php echo $animal->nombre ?></h1>
        <img src="img/<?php echo $animal->foto?>" alt="<?php echo $animal->foto?>">
        <?php
        if ($animal->foto == null) {
            echo "<h3>No hay una foto disponible</h3>";
        }
        ?>
        <p class="lead mt-3">Especie: <?php echo $animal->especie ?></p>
        <p class="lead mt-3">Raza: <?php echo $animal->raza ?></p>
        <p class="lead mt-3">Edad (años): <?php echo $animal->edad ?></p>
        <p class="lead mt-3">Descripcion de la especie: <?php echo $animal->descripcion ?></p>
        <p class="lead mt-3">Descripcion del individuo: <?php echo $animal->personalidad ?></p>
    </section>
    </main>

    <?php include_once 'templates/footer.phtml';
}
function mostrarIndividuoModificar($id){
    include_once 'templates/header.phtml';
    $animal = obtenerIndividuoPorID($id);
    ?>
    <form action="modificar" method="POST" class="my-4">
        <div class="oculto">
            <input type="number" name="id" value="<?php echo $animal->id?>">
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input required name="nombre" type="text" class="form-control" value="<?php echo $animal->nombre?>">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label>Especie</label>
                    <select required name="especie" class="form-control">
                        <option value="" selected disabled >Seleccione una opcion</option>
                        <option value="1">Perro</option>
                        <option value="2">Gato</option>
                        <option value="3">Roedor</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Edad (en años)</label>
                    <input required type="number" name="edad" class="form-control" min=0 max=100 value="<?php echo $animal->edad?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Raza</label>
                    <input required name="raza" type="text" class="form-control" value="<?php echo $animal->raza?>">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Color</label>
                    <input required name="color" type="text" class="form-control" value="<?php echo $animal->color?>">
                </div>
            </div>
        </div>
        <div class=col-12>
            <div class="form-group">
                <label>Personalidad</label>
                <textarea name="personalidad" class="form-control" rows="3"><?php echo $animal->personalidad?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Modificar</button>
    </form>
    
    <?php include_once 'templates/footer.phtml';
}
function modificarDatos() {
    // ACA HABRIA QUE HACER UNA VALIDACION DE LOS DATOS, PARA CHEQUEAR QUE LOS CAMPOS NO VENGAN VACIOS O CON DATOS ERRONEOS.
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $edad = $_POST['edad'];
    $color = $_POST['color'];
    $personalidad = $_POST['personalidad']; 
    $fk_id_especie = $_POST['especie'];

    modificarIndividuo($id, $nombre, $raza, $edad, $color, $personalidad, $fk_id_especie);

    if ($_POST['id'] != null) {
        header('Location: ' . BASE_URL);
    } else {
        echo "Error al modificar al individuo";
    }
}