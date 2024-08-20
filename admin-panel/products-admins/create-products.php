<?php require "../includes/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php
if (!isset($_SESSION['admin_name'])) {

  //echo "<script>window.location.href = '" . ADMINURL . "';</script>";
  echo "<script>window.location.href = '" . ADMINURL . "/admins/login-admins.php';</script>";
}



if (isset($_POST['submit'])) {

  if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description']) || $_POST['type'] == "Choose Type") {
    echo "<script>alert ('Fill all the fields');</script>";
  } else {
    $aname = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $image = $_FILES['image']['name'];

    $directory = "images/" . basename($image);

    // Process the form data further (e.g., save to database, perform additional validation, etc.)

    $insert = $conn->prepare("INSERT INTO products(name,price,description,type,image)
     VALUES(:name, :price,:description,:type,:image)");

    $insert->execute([
      ":name" => $aname,
      ":price" => $price,
      ":description" => $description,
      ":type" => $type,
      ":image" => $image,
    ]);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $directory)) {
      echo "<script>alert ('updated Successfully');</script>";
      echo "<script>window.location.href = 'show-products.php';</script>";
    } else {
      echo "<script>alert ('Failed to upload image');</script>";
    };
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Product</h5>
        <form method="POST" action="create-products.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control" />

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="form-outline mb-4 mt-4">

            <select name="type" class="form-select  form-control" aria-label="Default select example">
              <option selected value="Choose Type">Choose Type</option>
              <option value="drink">drink</option>
              <option value="dessert">dessert</option>
            </select>
          </div>

          <br>



          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


        </form>

      </div>
    </div>
  </div>
</div>

<?php require "../includes/footer.php"; ?>