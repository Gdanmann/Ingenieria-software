<?php
session_start();

//credencialesde acceso a la base de datos

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'login-php';


//conexion a la base de datos

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()){
    //si hay error en la conexion
    exit('Fallo en la conexion de MySQL:'. mysqli_connect_error());
}

//se valida si se envio informacion, con la funcion isset

if(!isset($_POST['username'], $_POST['paswword']))
{
    //si no hay datos muestra error y redirecciona a login

    header('location: index.html');
}

//evitar inyeccion sql

if($stmt = $conexion->prepare('SELECT id,password FROM accounts
WHERE username = ?')){

    //parametors de enlace de la cadnea s

    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();

}

//se valida si lo ingresado coincide con la base de datos

$stmt->store_result();
if($stmt->num_rows > 0){
    $stmt->bind_result($id, $password);
    $stmt->fetch();


    //se confirma que la cuenta existe, se valida la contraseña

    if($_POST['password']=== $password){

        //la conexion fue un exito


        session_regenerate_id();
        $_SESSION['loggedin']=TRUE;
        $_SESSION['name']= $_POST['username'];
        $_SESSION['id']= $id;
        header('Location: inicio.php');
    }
}else{
    //usuario incorrecto
    header('Location: index.html');
}
    $stmt->close();