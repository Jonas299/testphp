<?php
    require_once __DIR__.'/../conection/init.php';
    //echo date('yy-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/sweetalert2/sweetalert2.min.css">
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/popper.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.min.js"></script>
    <script src="../lib/sweetalert2/sweetalert2.min.js"></script>
</head>
<body>
    <div class="section">
        <div class="jumbotron text-center">
            <h1>TEST PHP</h1>
            <p>Test for Agency 7AM</p> 
        </div>
        <div class="container">
            <form action="" class="form" method="POST">
                <input type="hidden" name="action" value="storeProducto">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" require> 
                    </div>
                    <div class="col-md-2">
                        <label for="cant">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" require>
                    </div>
                    <div class="col-md-3">
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control" require>
                    </div>
                    <div class="col-md-3 align-self-end">
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </div>
                </div>
            </form>
            <div class="row mt-4">
                <h2 class="text-muted text-center w-100 font-weight-bold">Productos</h2>
            </div>
            <!--SEARH-->
            <form action="" method="GET" class="form-row">
                <div class="col-10">
                    <label for="">Buscar por</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select name="campo" id="campo" class="custom-select">
                                <option value="id">ID</option>
                                <option value="nombre">Nombre</option>
                                <option value="precio">Precio</option>
                            </select>
                        </div>
                        <input type="text" name="search" class="form-control">
                    </div>
                    
                </div>
                <div class="col-2 align-self-end">
                    <button class="btn btn-primary w-100">Buscar</button>
                </div>
            </form>
            <!--/-->
            <div class="row mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($productos as $key => $producto) { ?>
                                <tr>
                                    <td><?php echo $producto['id'] ?></td>
                                    <td><?php echo $producto['nombre'] ?></td>
                                    <td><?php echo $producto['cantidad'] ?></td>
                                    <td><?php echo $producto['precio'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>