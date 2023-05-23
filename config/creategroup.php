<?php
require '../vendor/autoload.php';
session_start();
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');

if (!empty($_POST['users'])) {
    $users = $_POST['users'];
    
    $group = [
        'group' => [
            'groupname' => $_POST['groupname'],
            'subject' => $_POST['groupsubject'],
        ],
        'users' => $users
    ];

    $collection = $db->groups;
    $result = $collection->insertOne($group);

    if ($result) {
        $_SESSION["success"] = "Grupo creado exitosamente";
        header('Location: ../pages/admin/group.php');
        exit();
    } else {
        $_SESSION["fail"] = "Error al crear el grupo";
    }
} else {
    $_SESSION["fail"] = "No se seleccionaron usuarios";
    header('Location: ../pages/admin/group.php');
    exit();
}
?>
