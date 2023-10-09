<?php
require_once './app/db.php';

function mostrarIndividuos() {
    require 'templates/header.php';

    $individuos = obtenerIndividuos();
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
                <a href="individuo/<?php echo $individuo->id?>" type="button" class='btn btn-success ml-auto'>Ver mas</a> <?php } ?>
            </div>
        </li>
<?php 
    require 'templates/footer.php';
}
?>
    </ul>
<?php

function añadirIndividuo() {
    // ACA HABRIA QUE HACER UNA VALIDACION DE LOS DATOS, PARA CHEQUEAR QUE LOS CAMPOS NO VENGAN VACIOS O CON DATOS ERRONEOS.
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $edad = $_POST['edad'];
    $color = $_POST['color'];
    $personalidad = $_POST['personalidad'];

    $id = insertarIndividuo($nombre, $raza, $edad, $color, $personalidad);

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
    include_once 'templates/header.php';
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

    <?php include_once 'templates/footer.php';
}
