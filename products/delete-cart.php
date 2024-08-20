<?php require "../include/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php ob_start();

if (!isset($_SERVER['HTTP_REFERER'])) {
   // redirect them to your desired location
   //page eka redirect wenawa variable eka zero nam <!-- //page eka redirect wenawa variable eka zero nam This PHP code checks if the `HTTP_REFERER` server variable is set. The `HTTP_REFERER` variable holds the address of the page (if any) which referred the user agent to the current page. This is set by the user's browser and can be empty or a previous URL from the same site or another site. -->
   header('location: http://localhost/coffe%20shop/coffe%20shop/');
   exit;
}

if (!isset($_SESSION['user_id'])) {

   echo "<script>window.location.href = '" . APPURL . "';</script>";
}


$deleteAll = $conn->query("DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'");
$deleteAll->execute();

echo "<script>window.location.href = 'cart.php';</script>";

ob_end_flush();

?>