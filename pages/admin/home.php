<?php
require '../../vendor/autoload.php';
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
    // Redirect to the login page
    header('Location: ./index.php');
    exit;
}
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');

$collection = $db->users;
$users = $collection->find();

if (isset($_SESSION["success"])) {
    // Mostrar el mensaje de éxito
    echo "<script>";
    echo "alert('Grupo creado con éxito')";
    echo "</script>";
    // Eliminar el mensaje de éxito para que no se muestre nuevamente después de la actualización de la página
    unset($_SESSION["success"]);
}
if (isset($_SESSION["fail"])) {
    echo "<script>";
    echo "alert('No se pudo crear el grupo')";
    echo "</script>";
    unset($_SESSION["fail"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin area | El capitán del mar</title>
	<link rel = "stylesheet" href = "../../css/styles.css" type = "text/css">
	<link	rel="stylesheet"	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"	crossorigin="anonymous">
	<link rel="icon" href="../../favicon.ico">
</head>
<body class="cbody">
    <div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img class="img-fluid pagelogo" src="../../images/logonav.png">
                <div>
                    <h2 class="titlenav">El Capitán del Mar | Área administrativa</h2>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./group.php">Grupos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </br>
    <div class="container mt-5">
        <h1>Registrar usuario</h1>
        <form method="post" action="../../config/register.php">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="dob">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
    </br>
    <footer class="pie">
        </br>
        </br>
        <div class="container text-center">
            <span class="texto">
                Este proyecto es hecho con el único fin de recibir una calificación
            </span>
        </div>
        </br>
        </br>
    </footer>
    <!-- jQuery and Bootstrap JS>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
</body>
</html>