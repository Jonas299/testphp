<?php
require_once __DIR__.'/../conection/config.php';
$con = new conection();
$productos = $con->show();
/*============| CONSULTAS |============*/
if (isset($_POST['action'])) {
    if($_POST['action'] == 'storeProducto'){
        $con->createProductos();
    }
    elseif($_POST['action'] == 'login'){
        $con->login();
    }
}

