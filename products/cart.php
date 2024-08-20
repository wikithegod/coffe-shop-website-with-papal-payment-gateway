<?php require "../include/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php ob_start();

if (!isset($_SESSION['user_id'])) {
	header("Location: " . APPURL . "");
}

$products = $conn->query("SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

//cart total

$cartTotal = $conn->query("SELECT SUM(price * quantity) AS total FROM cart WHERE user_id = '$_SESSION[user_id]'");
$cartTotal->execute();

$allcartTotal = $cartTotal->fetch(PDO::FETCH_OBJ);

//checkout

if (isset($_POST['checkout'])) {

	$_SESSION['total_price'] = $_POST['total_price'];

	echo "<script>window.location.href = 'checkout.php';</script>";
}
ob_end_flush();
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>../images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Cart</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> <span>Cart</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<?php if (count($allProducts) > 0) : ?>

						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allProducts as $product) :  ?>

									<tr class="text-center">
										<td class="product-remove"><a href="delete-product.php?id=<?php echo  $product->id; ?>"><span class="icon-close"></span></a></td>

										<td class="image-prod">
											<div class="img" style="background-image:url(<?php echo  IMAGEURL;  ?>/<?php echo  $product->image; ?>);"></div>
										</td>

										<td class="product-name">
											<h3><?php echo  $product->name; ?></h3>
											<p><?php echo  $product->description; ?></p>
										</td>

										<td class="price">Rs<?php echo  $product->price; ?></td>

										<td>
											<div class="input-group mb-3">
												<input disabled type="text" name="quantity" class="quantity form-control input-number" value="<?php echo  $product->quantity; ?>" min="1" max="100">
											</div>
										</td>

										<td class="total"><?php echo  $product->price * $product->quantity; ?></td>
									</tr><!-- END TR-->
								<?php endforeach; ?>

							</tbody>
						</table>
					<?php else : ?>
						<h3 class="text-center">No Products in Cart</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>Rs <?php echo $allcartTotal->total; ?></span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>Rs50.00</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>Rs10.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<?php if (count($allProducts) > 0) : ?>


							<span>RS<?php echo $allcartTotal->total  +  50 - 10; ?></span>
						<?php endif; ?>
					</p>
				</div>
				<form method="POST" action="cart.php">
					<input type="hidden" name="total_price" value="<?php echo $allcartTotal->total  + 50 - 10; ?>">


					<?php if (count($allProducts) > 0) : ?>
						<p class="text-center"><button style="color: transparent;" name="checkout" type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button></p>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
</section>



<?php require "../include/footer.php"; ?>