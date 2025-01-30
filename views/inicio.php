<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:/views/login.php');
    exit();
}

$user = $_SESSION['user'];
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
        <button onclick="window.location.href='/index.php?tabla=user&accion=listar'">Ver Usuarios</button>
        <button onclick="window.location.href='/index.php?tabla=digimon&accion=listar'">Ver Digimones</button>
    </div>
</body>
</html>