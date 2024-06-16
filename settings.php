<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICON -->
    <link rel="icon" href="assets/img/favicon.png">
    <!--   Title Page -->
    <title>Food Menu Admin - Restaurant Setting</title>
    <?php include('include/css.php'); ?>
</head>

<body>
<!--  page loader -->
<?php include('include/preloader.php'); ?>
<!--  page loader end -->


<!--  custom theme area start -->
<?php /*include ('include/theme.php');*/ ?>
<!--  custom theme area end -->


<!--  Header area start -->
<?php include('include/header.php'); ?>
<!--  Header area end -->


<!--  Nav menu area start -->
<?php include('include/navbar.php'); ?>
<!-- /.dash-navbar-left -->


<div class="main-wraper-bg mar_lft_282">
    <div class="homepage-sec1">
        <div class="container-fluid">
            <div class="row">
                <?php
                if (isset($_SESSION['alert']) && $_SESSION['alert'] == 'success') {
                    ?>
                    <div class="col-12">
                        <div class="alert-single-item cta2">
                            <h4>Success - Data Updated Successful<span class="alert-close"><i
                                        class="zmdi zmdi-close"></i></span></h4>
                        </div>
                    </div>
                    <?php
                    unset($_SESSION['alert']);
                }
                if (isset($_SESSION['alert']) && $_SESSION['alert'] == 'danger') {
                    ?>
                    <div class="col-12">
                        <div class="alert-single-item cta5">
                            <h4>Sorry - Something went wrong<span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                        </div>
                    </div>
                    <?php
                    unset($_SESSION['alert']);
                }
                ?>
                <div class="col-lg-12">
                    <div class="inner-title-area">
                        <h3>Setting</h3>
                        <h4>Restaurant Profile</h4>
                    </div>
                </div>
            </div>
            <div class="wraper-bg-allpage">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-basic form-shadow">
                            <?php
                            $contact = $db_handle->runQuery("select * from restaurant_contact where user_id = {$_SESSION['admin']}");
                            ?>
                            <h3 class="form-title">Contact Info</h3>
                            <form action="Update" method="post">
                                <p>Address *</p>
                                <input type="text" value="<?php echo $contact[0]['address']; ?>" name="address">
                                <p>Contact Number</p>
                                <input type="text" value="<?php echo $contact[0]['contact_number_one']; ?>"
                                       name="contact_number_one" >
                                <p>Alternate Contact Number</p>
                                <input type="text" value="<?php echo $contact[0]['contact_number_two']; ?>"
                                       name="contact_number_two" >
                                <p>Email Address</p>
                                <input type="text" value="<?php echo $contact[0]['email_one']; ?>" name="email_one">
                                <p>Alternative Email Address</p>
                                <input type="text" value="<?php echo $contact[0]['email_two']; ?>" name="email_two">
                                <p>Facebook Link</p>
                                <input type="text" value="<?php echo $contact[0]['facebook']; ?>" name="facebook">
                                <p>Instagram Link</p>
                                <input type="text" value="<?php echo $contact[0]['insta']; ?>" name="insta">
                                <p>Youtube Link</p>
                                <input type="text" value="<?php echo $contact[0]['youtube']; ?>" name="youtube">
                                <p>Website Link</p>
                                <input type="text" value="<?php echo $contact[0]['website']; ?>" name="website">

                                <input type="submit" name="update_contact_info" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- footer area start -->
<?php include('include/footer.php'); ?>
<!-- footer area end -->


<?php include('include/js.php'); ?>

</body>


</html>