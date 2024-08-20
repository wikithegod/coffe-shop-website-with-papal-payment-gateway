<?php require "../includes/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {

    //echo "<script>window.location.href = '" . ADMINURL . "';</script>";
    echo "<script>window.location.href = '" . ADMINURL . "/admins/login-admins.php';</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    if (isset($_POST['submit'])) {




        if (empty($_POST['status']) || $_POST['status'] == "Choose Type") {
            echo "<script>alert ('Fill all the fields');</script>";
        } else {
            $status = $_POST["status"];

            // Process the form data further (e.g., save to database, perform additional validation, etc.)

            $update = $conn->prepare("UPDATE orders SET status= :status WHERE id='$id'");

            $update->execute([
                ":status" => $status,

            ]);
            echo "<script>alert ('Updated Successfully');</script>";

            echo "<script>window.location.href = 'show-orders.php';</script>";
        }
    }
}

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">update status</h5>
                <form method="POST" action="update-status.php?id=<?php echo $id; ?>">
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">

                        <select name="status" class="form-select  form-control" aria-label="Default select example">
                            <!-- <option selected>Choose Type</option> -->
                            <option selected value="Choose Type">Choose Type</option>
                            <option value="Pending">Pending</option>
                            <option value="Deliverd">Delivered</option>
                        </select>
                    </div>






                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update </button>


                </form>

            </div>
        </div>
    </div>
</div>

<?php require "../includes/footer.php"; ?>