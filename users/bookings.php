<?php require "../include/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: " . APPURL . "");
}

$bookings = $conn->query("SELECT * FROM bookings WHERE user_id = '$_SESSION[user_id]'");
$bookings->execute();

$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);


?>


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>../images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Bookings</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> </p>
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
                    <?php if (count($allBookings) > 0) : ?>

                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Write Review</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allBookings as $booking) :  ?>

                                    <tr class="text-center">
                                        <td class="product-remove"><?php echo $booking->first_name; ?></td>

                                        <td class="image-prod">
                                            <?php echo $booking->last_name; ?>
                                        </td>

                                        <td class="product-name">
                                            <h3><?php echo  $booking->date; ?></h3>
                                            <!-- <p><?php echo  $booking->time; ?></p> -->
                                        </td>

                                        <td class="Time"><?php echo  $booking->time; ?></td>

                                        <td>
                                            <?php echo  $booking->phone; ?>
                                        </td>

                                        <td class="Message"><?php echo  $booking->message; ?></td>
                                        <td class="Status"><?php echo  $booking->status; ?></td>

                                        <?php if ($booking->status == "Confirmed") : ?>

                                            <td class="Status"><a class="btn btn-primary" href="<?php echo APPURL; ?>/reviews/write-review.php">write review</a></td>
                                        <?php endif; ?>
                                    </tr><!-- END TR-->
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php else : ?>
                        <h3 class="text-center">Have A Free Time?Book A Table</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php require "../include/footer.php"; ?>