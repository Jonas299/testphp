<?php
require_once __DIR__.'/../conection/config.php';
$con = new conection();

/*============| CONSULTAS |============*/
if (isset($_POST['action'])) {

    if($_POST['action'] == 'get'){
        $con->getUsers();
    }
    elseif($_POST['action'] == 'set'){
        $con->setUser();
    }
    elseif($_POST['action'] == 'update'){
        $con->updateUser();
    }
    elseif($_POST['action'] == 'delete'){
        $con->deleteUser();
    }
}

