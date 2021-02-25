<?php


class conection{
    public $conection;

    public function __constructor($conection){
        $this->conection();
        $this->conection = $conection;
    }

    public function conection(){
        try {
            $server = 'localhost';
            $db = 'testphp';
            $user = 'root';
            $pwd = '';
            $conect = mysqli_connect($server, $user, $pwd, $db);
            $this->conection = $conect;
            return $conect;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function show(){
        try {
            $query = "";
            if(isset($_GET['campo'])){
                $query = "SELECT * FROM productos WHERE ".$_GET['campo']." LIKE '%".$_GET['search']."%'";
            }
            else{
                $query = "SELECT * FROM productos";
            }
            $consult = mysqli_query($this->conection, $query);
            return $consult;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function createProductos(){
       
        try{
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            //$created_at = now();
            
            $query = "INSERT INTO productos (nombre,cantidad,precio,created_at) VALUES ('$nombre','$cantidad', '$precio','now()')";
            $consult = mysqli_query($this->conection, $query);
            return  header('location:/test/productos');
        }
        catch (\Throwable $th) {
            //throw $th;
            die($th);
        }
    }
    public function updateProductos(){

    }
    public function deleteProductos(){

    }

    /*===========| LOGIN |=========== */
    public function login(){
        //$data = file_get_contents('php://input');
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        $data = 
        [
            "user"=>$_POST['user'],
            "pass"=>$_POST['pass'],

        ];
        echo json_encode($data,true);
    }
    public function getUsers(){
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->conection,$query);
        $users = array("users"=>[]);
        foreach ($result as $key => $user) {
            array_push($users["users"],[
                "id" => $user['id'],
                "nombre" => $user['nombre'],
                "apellido" => $user['apellido'],
                "email" => $user['email']
            ]);
        }
        //print_r($users);
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        echo json_encode($users);
    }
    public function setUSer(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "INSERT INTO users(nombre,apellido,email,password,created_at) VALUES ('$nombre','$apellido','$email','$password','now()')";
        $result = mysqli_query($this->conection,$query);
        if($query){
            header('success',true,200);
        }
        else{
            header('success',true,500);
        }
    }
    public function deleteUser(){
        try {
            $id = $_POST['id'];
            $query = "DELETE FROM users WHERE id = $id";
            $result = mysqli_query($this->conection,$query);
        } catch (\Throwable $th) {
            //throw $th;
            header('Error',true,500);
        }
    }
    public function deleteUser(){
        try {
            $id = $_POST['id'];
            $query = "DELETE FROM users WHERE id = $id";
            $result = mysqli_query($this->conection,$query);
        } catch (\Throwable $th) {
            //throw $th;
            header('Error',true,500);
        }
    }


}

