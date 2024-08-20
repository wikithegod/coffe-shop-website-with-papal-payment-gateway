<?php
ob_start(); // Start output buffering at the beginning
require "../include/header.php";
?>
<?php require "../config/config.php"; ?>

<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: " . APPURL . "");
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteProduct = $conn->query("DELETE FROM cart WHERE id = '$id'");
    $deleteProduct->execute();


    header("Location: cart.php");
}



?>