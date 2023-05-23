<?php
require '../../vendor/autoload.php';
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page
    header('Location: ../../index.php');
    exit;
}
$user = $_SESSION['user'];
$name = $user['username'];

$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');

$collection = $db->users;
$users = $collection->find();

$collectionm = $db->messages;
$messages = $collectionm->find();

$collectiong = $db->groups;
$query = [ 'users' => $name ];
$groups = $collectiong->find($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mensajes | El capitán del mar</title>
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
                    <h2 class="titlenav">El Capitán del Mar</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./perfil.php">Perfil</a>
                        </li>
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
    </br>
    <content>
        <div class="container-fluid card">
            <h3>
                Mensajes | <?php echo $user['username'] ?>
            </h3>
            <div class="container-fluid">
                <div class="row table-scroll">
                    <table class="col-sm-3 titlemessage ">
                        <th class="titlecontact">
                            Contactos
                        </th>
                        <?php foreach ($users as $userc) {
                            if ($userc['user']['name'] != $user['username']) { ?>
                            <tr class="contact">
                                <td class="contact" onclick="select('<?php echo $userc['user']['name']; ?>', '<?php echo $user['username']; ?>')">
                                    <div class="text-center">
                                        <?php echo $userc['user']['name']; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        } ?>
                        <td class="titlecontact">
                            <b>Grupos</b>
                        </td>
                        <?php if ($groups !== null) {
                            foreach ($groups as $document) {
                                echo "<tr class='contact'>" ?>
                                    <td onclick="getgroup('<?php echo $document['group']['groupname'] ?>', '<?php echo $user['username']; ?>')">
                                        <?php echo $document['group']['groupname'] . "<br>";
                                    echo "</td>";
                                echo "</tr>";
                            } 
                        } else {
                            echo "<tr class='contact'>";
                            echo "<td class='contact'>";
                            echo "<div class='text-center'>";
                            echo "No hay grupos";
                            #echo $groups;
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }?>
                    </table>
                    <div class="col-sm-8 message">
                        <div class="container-fluid">
                            <div class="row container">
                                <div class="col-sm-12 messagebody">
                                    <div id="respuesta">
                                        Seleccione un chat o grupo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </content>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://requirejs.org/docs/release/2.3.6/minified/require.js"></script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
    <script src="../../js/selectuser.js"></script>
    <!--script src="../../js/send.js"></script-->
</body>
</html>