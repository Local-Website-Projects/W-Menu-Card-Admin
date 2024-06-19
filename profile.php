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
    <title>Food Menu Admin - User Profile</title>
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
                        <h3>Profile</h3>
                        <h4>User Profile</h4>
                    </div>
                </div>
            </div>
            <div class="wraper-bg-allpage">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-basic form-shadow">
                            <h3 class="form-title">Basic Info</h3>
                            <form action="Update" method="post">
                                <p>Full Name</p>
                                <input type="text" value="<?php echo $fetch_admin[0]['admin_name']; ?>" name="full_name"
                                       required>
                                <p>Restaurant Name</p>
                                <input type="text" value="<?php echo $fetch_admin[0]['restaurant_name']; ?>"
                                       name="restaurant_name" required>
                                <p>Contact Number</p>
                                <input type="text" value="<?php echo $fetch_admin[0]['contact_number']; ?>"
                                       name="contact_number" required>
                                <p>WhatsApp Number</p>
                                <input type="text" value="<?php echo $fetch_admin[0]['whatsapp']; ?>" name="whatsapp">
                                <p>Note in Menu</p>
                                <input type="text" value="<?php echo $fetch_admin[0]['note']; ?>" name="note">
                                <p class="form-element-left-title">Restaurant Availability</p>
                                <div class="col-lg-8">
                                    <div class="radio-btn-bottms">
                                    <span class="radio-btn ctas1">
                                        <input id="radio-2ss" name="status" value="1" type="radio" <?php if ($fetch_admin[0]['availability'] == '1') echo 'checked';?>>
                                        <label for="radio-2ss" class="radio-label">On</label>
                                    </span>
                                        <span class="radio-btn ctas2">
                                        <input id="radio-3ss" name="status" value="0" type="radio" <?php if ($fetch_admin[0]['availability'] == '0') echo 'checked';?>>
                                        <label for="radio-3ss" class="radio-label">Off</label>
                                    </span>
                                    </div>
                                </div>
                                <input type="submit" name="personal_info_update" value="Update">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-basic form-shadow">
                            <h3 class="form-title">Password Update</h3>
                            <form action="Update" method="post" id="password_update">
                                <p>Old Password</p>
                                <input type="password" placeholder="old password" name="old_password"
                                       required>
                                <p>New Password</p>
                                <input type="password" placeholder="new_password"
                                       id="new_password" name="new_password" required>
                                <p>Confirm New Password</p>
                                <input type="password" placeholder="Confirm New Password"
                                       name="confirm_password" id="confirm_new_password" required>
                                <span id="password_match_message" style="color: red; display: none;">Password and Confirm Password do not match.</span>
                                <input type="submit" name="confirm_new_password" value="Update">

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
<script>
    document.getElementById("confirm_new_password").addEventListener("input", function() {
        var newPassword = document.getElementById("new_password").value;
        var confirmNewPassword = this.value;
        var messageSpan = document.getElementById("password_match_message");
        let btn = document.getElementById("update_password");

        if (newPassword !== confirmNewPassword) {
            messageSpan.style.display = "block";
        } else {
            messageSpan.style.display = "none";
        }
    });
    document.getElementById('password_update').addEventListener('submit', function (event) {
        var password = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_new_password').value;
        var message = document.getElementById('password_match_message');

        if (password !== confirmPassword) {
            message.textContent = "Password and Confirm Password do not match.";
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
</body>


</html>