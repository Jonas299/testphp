<?php
    require_once __DIR__.'/../../conection/config.php';
    require_once __DIR__.'/../../conection/init.php';
    //echo date('yy-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../lib/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow col-md-10 p-0 m-auto">
            <div class="card-header">
                <h3 class="text-muted font-weight-bold">Crear Usuario</h3>
            </div>
            <div class="card-body">
                <div class="row" id="newUser">
                    <div class="col-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="pass">Contraseña</label>
                        <input type="password" id="pass" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12" id="buttons">
                        <button class="btn btn-primary w-100" id="btnNewUser" onclick="set()">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table text-center" id="users">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="../../lib/jquery/jquery.min.js"></script>
<script src="../../lib/bootstrap/popper.min.js"></script>
<script src="../../lib/bootstrap/bootstrap.min.js"></script>
<script src="../../lib/sweetalert2/sweetalert2.min.js"></script>
<script src="../../js/script.js"></script>
<script>
    $(document).ready(function(){
        get();
    })
</script>
</body>
</html>