<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page
    header('Location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil | El capitán del mar</title>
	<link rel = "stylesheet" href = "../../css/styles.css" type = "text/css">
	<link	rel="stylesheet"	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"	crossorigin="anonymous">
	<link rel="icon" href="../../favicon.ico">
</head>
<body class="cbody">
    <div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="./index.php">
                    <img class="img-fluid pagelogo" src="../../images/logonav.png">
                </a>
                <div>
                    <h2 class="titlenav">El Capitán del Mar | Perfil</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./soporte.php">Soporte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
      <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">User Profile</h1>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="profile-picture text-center">
          <img src="profile-picture.jpg" alt="Profile Picture">
        </div>
      </div>
      <div class="col-md-8">
        <div class="profile-info">
          <p><strong>Nombre:</strong></p>
          <p><strong>Edad:</strong></p>
          <p><strong>Alias:</strong></p>
          <p><strong>Correo:</strong></p>
        </div>
      </div>
    </div>
  </div>
    </br>
    <content>
        <div class="container-fluid card">
        </div>
    </content>
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