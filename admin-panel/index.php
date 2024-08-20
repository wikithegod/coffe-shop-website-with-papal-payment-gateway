<?php require "includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {

  //echo "<script>window.location.href = '" . ADMINURL . "';</script>";
  echo "<script>window.location.href = '" . ADMINURL . "/admins/login-admins.php';</script>";
}

//bookings count
$bookings = $conn->query("SELECT COUNT(*) AS count_bookings FROM bookings");
$bookings->execute();

$bookingsCount = $bookings->fetch(PDO::FETCH_OBJ);

//product count

$product = $conn->query("SELECT COUNT(*) AS count_products FROM products");
$product->execute();

$productCount = $product->fetch(PDO::FETCH_OBJ);

//orders count
$orders = $conn->query("SELECT COUNT(*) AS count_orders FROM orders");
$orders->execute();

$ordersCount = $orders->fetch(PDO::FETCH_OBJ);

//admins count
$admins = $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
$admins->execute();

$adminsCount = $admins->fetch(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of products: <?php echo $productCount->count_products ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Orders</h5>

        <p class="card-text">number of orders: <?php echo $ordersCount->count_orders; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bookings</h5>

        <p class="card-text">number of bookings: <?php echo $bookingsCount->count_bookings; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of admins: <?php echo $adminsCount->count_admins; ?></p>

      </div>
    </div>
  </div>
</div>
<!--  <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->


<?php require "includes/footer.php"; ?>