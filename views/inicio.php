<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('location:login.php');
    exit();
}

$user = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
</head>
<body>
    <div class="buttons">
        <?php
            if($user->admin == 1){
                ?>
                <button class="buttons--boton">Listar Usuarios</button>
                <button class="buttons--boton">Dar alta a Digimon</button>
                <button class="buttons--boton">Definir Evoluciones</button>
                <button class="buttons--boton">Ver Digimones</button>
                <button class="buttons--boton">Borrar Digimones</button>
                <?php
            }else{
                
            }
        ?>
    </div>
</body>
</html>