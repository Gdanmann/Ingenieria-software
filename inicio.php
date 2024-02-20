<?php

//confirmar sesion

    session_start();
    if(!isset($_SESSION['loggedin'])){

        header('Location: index.html');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class='loggedin'>
    <nav class="navtop">

    <h1 style="color:white;">BIENVENIDO</h1>

    <a href="perfil.php"style="color:white;"><i class="fas fa-user-circle"></i>
    Informacion del usuario </a>

    
    <a href="cerrar-sesion.php"style="color:white;"><i class="fas fa-sign-out-alt"></i>
    Cerrar Sesion </a>
</nav>

<div class="content">
    <h2>PAGINA DE INICIO</h2>
    <p>Hola de nuevo, <?= $_SESSION['name'] ?> !!! </p>

</div>
    
</body>
</html>