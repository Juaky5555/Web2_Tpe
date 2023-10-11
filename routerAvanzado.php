<?php
// require_once "router.php";
// require_once "individuos.php";
// require_once "especies.php";
// include_once 'Controller.php';
// include_once './app/db.php';
// include_once 'PrimerController.php';

// function parceURL($url){
//     $partesURL = explode ("/", $url);
//     $arrayReturn[router::$ACTION] = $partesURL[0];
//     $arrayReturn[router::$PARAMS] = isset($partesURL[1]) ? array_slice($partesURL,1) : null;
//     return $arrayReturn;
// }

// //ARREGLO DE 2 POSICIONES
// $urlData = parceURL($_GET[router::$ACTION]);

// $actionName = $urlData[router::$ACTION];

// if (array_key_exists($actionName, router::$ACTIONS)) {
//     $params = $urlData[router::$PARAMS];
//     $methodName = router::$ACTIONS[$actionName];

//     if (isset($params) && $params != null) {
//         $methodName($params);
//     }else{
//         $methodName;
//     }
// }else {
//     mostrarIndividuos();
// }


?>