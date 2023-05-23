<?php
require '../vendor/autoload.php'; // Import the autoloader for the MongoDB library
session_start();

if ($_SESSION['admin'])
{
    header('../pages/admin/home.php');
}
// use MongoDB\Client;
#require 'vendor/autoload.php'; // Include the Composer autoloader

// use MongoDB\Driver\Manager;
// use MongoDB\Database;

// MongoDB connection settings
#$connectionString = "mongodb://localhost:27017"; // Replace with your MongoDB host
#$databaseName = "messagesdb"; // Replace with your MongoDB database name
#$mongoClient = new MongoDB\Driver\Manager("mongodb://localhost:27017");
#$db = 
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->selectDatabase('messagesdb');
// Create a new MongoDB manager
#$manager = new Manager($connectionString);

// Create a new MongoDB database object
#$database = new Database($manager, $databaseName);

$username = $_POST['username'];
$password = $_POST['password'];

// Create a filter to match the username and password
$filter = [
    'user.name' => $username,
    'user.pass' => $password
];

// Query the adminuser collection
$collection = $db->adminuser;
$result = $collection->findOne($filter);

// Check if the result is not null (i.e., login successful)
if ($result !== null) {
    // Store the logged-in user's information in the session
    $_SESSION['admin'] = [
        'username' => $result->user->name
    ];
    
    // Redirect to the home page or any other authorized page
    header('Location: ../pages/admin/home.php');
    exit;
} else {
    // Redirect back to the login page with an error message
    header('Location: index.php?error=1');
    exit;
}
?>
