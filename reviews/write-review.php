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
    header("Location: " . APPURL . "");
}


if (isset($_POST['submit'])) {

    if (
        empty($_POST['review'])
    ) {
        echo "<script>alert ('Fill all the fields');</script>";
    } else {

        $review = $_POST["review"];
        $username = $_SESSION['username'];


        //$writeReview = $conn->prepare("INSERT INTO reviews (review) VALUES(:review)");
        $writeReview = $conn->prepare("INSERT INTO reviews (review, username) VALUES(:review, :username)");


        $writeReview->execute([
            ":review" => $review,
            ":username" => $username

        ]);
        echo "<script>alert ('Review Submiteed');</script>";
        echo "<script>window.location.href = '" . APPURL . "';</script>";
    }
}
ob_end_flush();

?>

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>../images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Write A Review</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> </p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <form action="write-review.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Write A Review </h3>
                    <div class="row align-items-end">
                        <!--<div class="col-md-12" style="width: 300px; height: 300px;"> -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="review">Review</label>
                                <input name="review" type="text" class="form-control" placeholder="write your review here">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <p><button type="submit" name="submit" class="btn btn-primary py-3 px-4">Submit Your Review</button></p>

                                </div>
                            </div>

                        </div>
                </form><!-- END -->


            </div> <!-- .col-md-8 -->


        </div>

    </div>
    </div>
</section> <!-- .section -->


<?php require "../include/footer.php"; ?>