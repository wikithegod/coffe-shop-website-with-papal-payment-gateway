<?php require "../include/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    // Check if the selected date is in the past
    if (strtotime($date) < strtotime(date("Y-m-d"))) {
        echo "<script>alert('Please select a future date.');</script>";
        echo "<script>window.location.href = '" . APPURL . "';</script>";
        exit(); // Stop further execution
    }

    // Validate other fields here
    if (empty($first_name) || empty($last_name) || empty($date) || empty($time) || empty($phone) || empty($message)) {
        echo "<script>alert('One or more inputs are empty.');</script>";
        echo "<script>window.location.href = '" . APPURL . "';</script>";
        exit(); // Stop further execution
    }

    // Proceed with booking if all validations pass
    $insert = $conn->prepare("INSERT INTO bookings (first_name, last_name, date, time, phone, message, user_id) VALUES (:first_name, :last_name, :date, :time, :phone, :message, :user_id)");
    $insert->execute([
        ":first_name" => $first_name,
        ":last_name" => $last_name,
        ":date" => $date,
        ":time" => $time,
        ":phone" => $phone,
        ":message" => $message,
        ":user_id" => $user_id
    ]);

    echo "<script>alert('Table booking successful.');</script>";
    echo "<script>window.location.href = '" . APPURL . "';</script>";
    exit(); // Stop further execution
}
?>
<?php require "../include/footer.php"; ?>
