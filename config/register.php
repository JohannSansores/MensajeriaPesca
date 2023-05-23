<?php
require '../vendor/autoload.php';
session_start();
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');
$user = [
    'user' => [
        'name' => $_POST['username'],
        'pass' => $_POST['password'],
        'nacimiento' => $_POST['dob'],
        'mail' => $_POST['email']
    ]
];
$collection = $db->users;
$result = $collection->insertOne($user);
if($result){
    $_SESSION["success"] = "Usuario registrado exitosamente";
    header('Location: ../pages/admin/home.php');
    exit();
} else {
    $_SESSION["fail"] = "Prueba 2";
}
?>