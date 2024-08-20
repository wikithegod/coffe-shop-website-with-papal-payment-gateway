<?php

//host
define("HOST", "localhost");

//dbname
define("DBNAME", "coffe shop");

//username
define("USER", "root");

//password
define("PASS", "");

$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . "", USER, PASS);

// Check if the connection was successful
if ($conn) {
    // Connection successful, no need to output anything
} else {
    // Connection failed
    die("Connection failed: " . $conn->errorInfo()[2]); // Output the error message and terminate the script
}
