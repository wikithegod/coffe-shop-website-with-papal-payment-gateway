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

    //delete image from folder

    $select = $conn->query("SELECT * FROM products WHERE id = '$id'");
    $select->execute();

    $image = $select->fetch(PDO::FETCH_OBJ);

    unlink("images/" . $image->image . "");

    $delete = $conn->query("DELETE FROM products WHERE id = '$id'");
    $delete->execute();


    echo "<script>window.location.href = 'show-products.php';</script>";
}



?>