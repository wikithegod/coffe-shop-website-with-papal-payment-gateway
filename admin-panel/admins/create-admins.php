<?php require "../includes/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {

  //echo "<script>window.location.href = '" . ADMINURL . "';</script>";
  echo "<script>window.location.href = '" . ADMINURL . "/admins/login-admins.php';</script>";
}



if (isset($_POST['submit'])) {

  if (empty($_POST['adminname']) || empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert ('Fill all the fields');</script>";
  } else {
    $adminname = $_POST["adminname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Process the form data further (e.g., save to database, perform additional validation, etc.)

    $insert = $conn->prepare("INSERT INTO admins(adminname,email,password) VALUES(:adminname, :email,:password)");

    $insert->execute([
      ":adminname" => $adminname,
      ":email" => $email,
      ":password" => $password,
    ]);
    echo "<script>alert ('Registered Successfully');</script>";

    echo "<script>window.location.href = 'admins.php';</script>";
  }
}
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Admins</h5>
        <form method="POST" action="create-admins.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />

          </div>

          <div class="form-outline mb-4">
            <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="adminname" />
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
          </div>







          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create Admin Account </button>


        </form>

      </div>
    </div>
  </div>
</div>

<?php require "../includes/footer.php"; ?>