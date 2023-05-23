<?php
require '../vendor/autoload.php';
$flag = 0;
$date = date('Y-m-d H:i');

if (isset($_GET['user']) && isset($_GET['from'])) {
    $username = $_GET['user'];
    $fromuser = $_GET['from'];
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->selectDatabase('messagesdb');
    $formme = [
        'message.to' => $username,
        'message.from' => $fromuser
    ];
    $collection = $db->messages;
    $result = $collection->find();
    echo "<div class='pie'>";
        echo "<div class='texto'>" . $username . "</div>";
    echo "</div>";
    echo "</br>";
    foreach($result as $message){
        if($message['message']['message'] !== null){
            if($message['message']['from'] === $fromuser && $message['message']['to'] === $username){
                echo "<div class='row justify-content-end' style='padding-right: 15px;'>";
                    echo "<div class='text-right messages'>";
                        echo $message['message']['message'] . "</br>";
                    echo "</div>";
                echo "</div>";
                echo "</br>";
                $flag = 1;
            }
            if($message['message']['from'] === $username && $message['message']['to'] === $fromuser){
                echo "<div class='row justify-content-start' style='padding-left: 15px;'>";
                    echo "<div class='text-left messages'>";
                        echo $message['message']['message'] . "</br>";
                    echo "</div>";
                echo "</div>";
                echo "</br>";
                $flag = 1;
            }
        }
    }
    if($flag === 0){
        echo "<div class='text-left'>";
        echo "No hay mensajes </br>";
        echo "</div>";
    }
    echo "</br>";
    echo "<form id='mensaje' method='post' action='../../config/send.php' class='row'>";
        echo "<input name='username' value='$fromuser' type='hidden'>";
        echo "<input id='touser' name='touser' value='$username' type='hidden'>";
        echo "<input name='date' value='$date' type='hidden'>";
        echo "<div class='col-md-10'>";
            echo "<textarea class='form-control' rows='4' placeholder='Escribe tu mensaje' id='message' name='message' required></textarea>";
        echo "</div>";
        echo "<div class='col-md-2'>";
            echo "<button class='btn btn-primary btn-block'>Enviar</button>";
        echo "</div>";
    echo "</form>";
}

if (isset($_GET['group']) && isset($_GET['userg'])) {
    $group = $_GET['group'];
    $fromuserg = $_GET['userg'];
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->selectDatabase('messagesdb');
    $formmeg = [
        'groupmessages.group' => $group,
        'groupmessages.from' => $fromuserg
    ];
    $collection = $db->groupmessages;
    $result = $collection->find();
    echo "<div class='pie'>";
        echo "<div class='texto'>" . $group . "</div>";
    echo "</div>";
    foreach($result as $message){
        if($message['groupmessages']['message'] !== null){
            if($message['groupmessages']['from'] === $fromuserg && $message['groupmessages']['group'] === $group){
                echo "<div class='row justify-content-end' style='padding-right: 15px;'>";
                    echo "<div class='text-right messages'>";
                        echo $message['groupmessages']['message'] . "</br>";
                    echo "</div>";
                echo "</div>";
                echo "</br>";
                $flag = 1;
            }
            if($message['groupmessages']['from'] !== $fromuserg && $message['groupmessages']['group'] === $group){
                echo "<div class='row justify-content-start' style='padding-left: 15px;'>";
                    echo "<div class='text-left messages'>";
                        echo $message['groupmessages']['message'] . "</br>";
                    echo "</div>";
                echo "</div>";
                echo "</br>";
                $flag = 1;
            }
        }
    }
    if($flag === 0){
        echo "<div class='text-left'>";
        echo "No hay mensajes </br>";
        echo "</div>";
    }
    echo "</br>";
    echo "</br>";
    echo "<form id='mensaje' method='post' action='../../config/sendgroup.php' class='row'>";
        echo "<input name='username' value='$fromuserg' type='hidden'>";
        echo "<input name='group' value='$group' type='hidden'>";
        echo "<input name='date' value='$date' type='hidden'>";
        echo "<div class='col-md-10'>";
            echo "<textarea class='form-control' rows='4' placeholder='Escribe tu mensaje' id='message' name='message' required></textarea>";
        echo "</div>";
        echo "<div class='col-md-2'>";
            echo "<button class='btn btn-primary btn-block'>Enviar</button>";
        echo "</div>";
    echo "</form>";
}
?>