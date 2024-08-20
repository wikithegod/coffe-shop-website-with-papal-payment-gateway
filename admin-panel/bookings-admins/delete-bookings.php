<?php require "../includes/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['admin_name'])) {

    //echo "<script>window.location.href = '" . ADMINURL . "';</script>";
    echo "<script>window.location.href = '" . ADMINURL . "/admins/login-admins.php';</script>";
    // header("Location: " . ADMINURL . "/admins/login-admins.php");
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->query("DELETE FROM bookings WHERE id = '$id'");
    $delete->execute();


    header("Location: show-bookings.php");
}



?>