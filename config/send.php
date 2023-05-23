<?php
require '../vendor/autoload.php';
session_start();
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');
$message = [
    'message' => [
        'from' => $_POST['username'],
        'date' => $_POST['date'],
        'message' => $_POST['message'],
        'to' => $_POST['touser']
    ]
];
$collection = $db->messages;
$result = $collection->insertOne($message);
if($result){
    header('Location: ../pages/client/index.php');
    exit();
} else {
    $_SESSION["fail"] = "Prueba 2";
}
?>