<?php require "../includes/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['admin_name'])) {

  //echo "<script>window.location.href = '" . ADMINURL . "';</script>";
  echo "<script>window.location.href = '" . ADMINURL . "/admins/login-admins.php';</script>";
}

//admins count
$orders = $conn->query("SELECT *  FROM orders");
$orders->execute();

$allOrders = $orders->fetchAll(PDO::FETCH_OBJ);


?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Orders</h5>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">first_name</th>

              <th scope="col">town</th>
              <th scope="col">state</th>
              <th scope="col">zip_code</th>
              <th scope="col">phone</th>
              <th scope="col">street_address</th>
              <th scope="col">total_price</th>
              <th scope="col">status</th>
              <th scope="col">update status</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allOrders as $order) : ?>

              <tr>
                <th scope="row"><?php echo  $order->id; ?></th>
                <td><?php echo  $order->first_name; ?></td>

                <td><?php echo  $order->town; ?></td>
                <td><?php echo  $order->state; ?></td>
                <td><?php echo  $order->zip_code; ?></td>
                <td><?php echo  $order->phone; ?></td>
                <td><?php echo  $order->street_address; ?></td>
                <td>Rs<?php echo  $order->total_price; ?></td>
                <td><?php echo  $order->status; ?></td>
                <td><a href="update-status.php?id=<?php echo $order->id; ?>" class="btn btn-warning  text-center ">update</a></td>

                <td><a href="delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger text-black text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php require "../includes/footer.php"; ?>