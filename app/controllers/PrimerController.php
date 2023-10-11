<?php
include_once 'Controller.php';
include_once './app/db.php';

class PrimerController extends Controller{
    function __construct(){ 
        // $this->model = null;
        // $this->view = null;
    }


    

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

    // function goHome (){//muestra el home
    //     $cardHomeAnimales = (object) [
    //         'title' => "Ver todos los animales",
    //         'img' => "portadaRazas",
    //         'href' => "all_animals",
    //         'descrip' => "Descubre todos nuestros animales ヽ(✿ﾟ▽ﾟ)/",
    //     ];

    //     $cardHomeEspecies = (object) [
    //         'title' => "Ver todas las especies",
    //         'img' => "siluetasEspecies",
    //         'href' => "all_species",
    //         'descrip' => "Descubre todas nuestras especies ヽ(✿ﾟ▽ﾟ)/",
    //     ];

    //     $arrayCards = [$cardHomeAnimales, $cardHomeEspecies];
    //     $this->view->showHome($arrayCards);
    // } 

    // function listAllAnimals(){//muestra todos los items join con categorias
    //     $razas = $this->model->getAllAnimals();
    //     $this->view->showAnimals($razas);  
    // }

    // function listAllSpecies(){//muestra todas las categorias
    //     $species = $this->model->getAllSpecies();
    //     $this->view->showSpecies($species); 
    // }

    // function listOneSpecie($idSpecie){//muestra los items de una categoria
    //     $specie = $this->model->getAllAnimalsOfSpecie($idSpecie);//trae todos los items
    //     $this->view->showAnimals($specie); 
    // }

    // function listOneAnimal($id){//muestra todos los items join con categorias
    //     $razas = $this->model->getOneAnimal($id);
    //     $this->view->showAnimals($razas); 
    // }
    
}
