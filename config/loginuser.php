<?php
require '../vendor/autoload.php';
session_start();

if ($_SESSION['user'])
{
    header('../pages/client/index.php');
}

$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');

$username = $_POST['username'];
$password = $_POST['password'];

$filter = [
    'user.name' => $username,
    'user.pass' => $password
];

$collection = $db->users;
$result = $collection->findOne($filter);

if ($result['user']['name'] === $username && $result['user']['pass'] === $password) {
    $_SESSION['user'] = [
        'username' => $result->user->name
    ];
    
    header('Location: ../pages/client/index.php');
    exit;
} else {
    $_SESSION["fail"] = "Error al crear el grupo";
    header('Location: ../index.php');
    exit;
}
?>