<?php require "../include/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    //page eka redirect wenawa variable eka zero nam <!-- //page eka redirect wenawa variable eka zero nam This PHP code checks if the `HTTP_REFERER` server variable is set. The `HTTP_REFERER` variable holds the address of the page (if any) which referred the user agent to the current page. This is set by the user's browser and can be empty or a previous URL from the same site or another site. -->
    header('location: http://localhost/coffe%20shop/coffe%20shop/');
    exit;
}

if (!isset($_SESSION['user_id'])) {
    header("Location: " . APPURL . "");
}


?>

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>../images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Pay And Continue</h1>
                    <!--<h3 class="mb-3 mt-5 bread"> </h3> -->

                    <!--   <p><a href="<?php echo APPURL; ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Cancel Payment and Go Home</a> </p> -->
                </div>


            </div>
        </div>
    </div>


</section>

<div class="container">
    <!-- Replace "test" with your own  paypal sandbox Business account app client ID -->
    <script src="test"></script>
    <!-- Set up a container element for the button -->
    <!--<div id="paypal-button-container"></div>-->
    <div id="paypal-button-container" class="text-center"></div>
    <div class="text-center">
        <a href="<?php echo APPURL; ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Cancel Payment and Go Home</a>
    </div>

    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['total_price']; ?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {

                    window.location.href = 'delete-cart.php';
                });
            }
        }).render('#paypal-button-container');
    </script>

</div>





<?php require "../include/footer.php"; ?>