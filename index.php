<?php require "include/header.php"; ?>
<?php require "config/config.php"; ?>

<?php

$products = $conn->query("SELECT * FROM products");
$products->execute();
/*$products = $conn->query("SELECT * FROM products WHERE type = 'drink'");
$products->execute();*/

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

$reviews = $conn->query("SELECT * FROM reviews");
$reviews->execute();

$allReviwes = $reviews->fetchAll(PDO::FETCH_OBJ);




?>




<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">The Best Coffee Testing Experience</h1>
					<p class="mb-4 mb-md-5">Indulge in the rich aroma of freshly brewed coffee, where every sip tells a story of passion and perfection</p>
					<p><a href="menu.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
					<p class="mb-4 mb-md-5">From the first sip to the last, immerse yourself in the velvety smoothness of our signature brews, crafted with care.</p>
					<p><a href="menu.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
					<p class="mb-4 mb-md-5">Join us on a journey of discovery as we celebrate the artistry of coffee, from bean to cup, in every delightful sip</p>
					<p><a href="menu.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-intro">
	<div class="container-wrap">
		<div class="wrap d-md-flex align-items-xl-end">
			<div class="info">
				<div class="row no-gutters">
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-phone"></span></div>
						<div class="text">
							<h3>+94 41 2222 111 </h3>
							<p>Call Us At Any Time.we are here to serve you</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-my_location"></span></div>
						<div class="text">
							<h3>Matara</h3>
							<p> Down South ,Sri Lanka</p>
						</div>
					</div>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="icon"><span class="icon-clock-o"></span></div>
						<div class="text">
							<h3>Open Monday-Friday</h3>
							<p>8:00am - 9:00pm</p>
						</div>
					</div>
				</div>
			</div>
			<div class="book p-4">
				<h3>Book a Table</h3>
				<form action="booking/book.php" method="POST" class="appointment-form">
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" name="first_name" class="form-control" placeholder="First Name">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" name="last_name" class="form-control" placeholder="Last Name">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<div class="input-wrap">
								<div class="icon"><span class="ion-md-calendar"></span></div>
								<input name="date" type="text" class="form-control appointment_date" placeholder="Date">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<div class="input-wrap">
								<div class="icon"><span class="ion-ios-clock"></span></div>
								<input name="time" type="text" class="form-control appointment_time" placeholder="Time">
							</div>
						</div>
						<div class="form-group ml-md-4">
							<input name="phone" type="text" class="form-control" placeholder="Phone">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
						</div>
						<?php
						if (isset($_SESSION['user_id'])) : ?>

							<div class="form-group ml-md-4">
								<button type="submit" name="submit" class="btn btn-white py-3 px-4">Book a Table </button>
							</div>
						<?php else : ?>
							<div class="form-group ml-md-4">
								<a href="auth/login.php" class="btn btn-white py-3 px-4">Login to Book</a>

							<?php endif; ?>

							</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="ftco-about d-md-flex">
	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
	<div class="one-half ftco-animate">
		<div class="overlap">
			<div class="heading-section ftco-animate ">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Our Story</h2>
			</div>
			<div>
				<p>We're not just another coffee shop. We're a passionate community dedicated to crafting exceptional coffee experiences. Founded in 2024 by Nimsara, our journey began with a love for the rich aroma and bold flavors of freshly roasted beans.

					We source our coffee beans from sustainable farms around the world, ensuring ethical practices and top-quality beans.we have something for every coffee lover..</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-services">
	<div class="container">
		<div class="row">
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-choices"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Easy to Order</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-delivery-truck"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Fastest Delivery</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-coffee-bean"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Quality Coffee</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Menu</h2>
					<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					<p><a href="menu.php" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="100">0</strong>
								<span>Coffee Branches</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="85">0</strong>
								<span>Number of Awards</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10567">0</strong>
								<span>Happy Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="900">0</strong>
								<span>Staff</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Best Coffee Sellers</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<?php foreach ($allProducts as $product) :   ?>
				<div class="col-md-3">
					<div class="menu-entry">
						<a target="_blank" href="products/product-single.php?id=<?php echo $product->id; ?>" class="img" style="background-image: url(<?php echo IMAGEURL; ?>/<?php echo  $product->image; ?>);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#"><?php echo $product->name; ?></a></h3>
							<p><?php echo $product->description; ?></p>
							<p class="price"><span>Rs <?php echo $product->price; ?></span></p>
							<p><a target="_blank" href="products/product-single.php?id=<?php echo $product->id; ?>" class="btn btn-primary btn-outline-primary">Show</a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<!--	<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>

<section class="ftco-gallery">
	<div class="container-wrap">
		<div class="row no-gutters">
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>



<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4">Customers Says</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">

		<div class="row d-flex no-gutters">
			<?php foreach ($allReviwes as $review) : ?>
				<div class="col-lg align-self-sm-end ftco-animate">
					<!-- <div class="col-md-4 align-self-sm-end ftco-animate"> -->


					<div class="testimony">
						<blockquote>
							<p>&ldquo; <?php echo $review->review; ?> &rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">

							<div class="name align-self-center"> <?php echo $review->username; ?> </div> <!--<span class="position">Illustrator Designer</span></div>-->
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>


<?php require "include/footer.php"; ?>