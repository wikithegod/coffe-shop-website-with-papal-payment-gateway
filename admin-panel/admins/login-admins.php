<?php require "../includes/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php

if (isset($_SESSION['admin_name'])) {

  echo "<script>window.location.href = '" . ADMINURL . "';</script>";
}

if (isset($_POST['submit'])) {

  if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('One or more inputs are empty');</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //querry pentru verificare email

    $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);



    if ($login->rowCount() > 0) {
      if ($password === $password) {
        // If the provided password matches the stored password
        // Start a session

        $_SESSION['admin_name'] = $fetch['adminname'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['admin_id'] = $fetch['id'];


        header("location: " . ADMINURL . "");
      } else {
        echo "<script>alert('email or password is wrong');</script>";
      }
    } else {
      echo "<script>alert('email or password is wrong');</script>";
    }
  }
}
/* if ($login->rowCount() > 0) {
      if (password_verify($password, $fetch['password'])) {
        //start sesiune

        header("location: " . APPURL . "/coffe%20shop/coffe%20shop");
      } else {
        echo "<script>alert('email or password is wrong');</script>";
      }
    } else {
      echo "<script>alert('email or password is wrong');</script>";
    } */


?>




<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" class="p-auto" action="login-admins.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

          </div>


          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

          </div>



          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


        </form>

      </div>
    </div>
  </div>
  <?php require "../includes/footer.php"; ?>