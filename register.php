<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");
$result = 0;

if (isset($_POST['registration'])) {
    $user_name = $db_handle->checkValue($_POST['user_name']);
    $restaurant_name = $db_handle->checkValue($_POST['restaurant_name']);
    $email = $db_handle->checkValue($_POST['email']);
    $contact_number = $db_handle->checkValue($_POST['contact_number']);
    $whatsapp = $db_handle->checkValue($_POST['whatsapp']);
    $password = $db_handle->checkValue($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_email = $db_handle->numRows("select * from users where admin_email = '$email'");
    if($check_email > 0){
        $result = 1;
    }else {
        $register_user = $db_handle->insertQuery("INSERT INTO `users`(`admin_name`, `restaurant_name`, `registration_date`, `admin_email`, `admin_password`, `status`, `type`, `inserted_at`,`contact_number`,`whatsapp` ) VALUES ('$user_name','$restaurant_name','$today','$email','$hashed_password','0','1','$inserted_at','$contact_number','$whatsapp')");
        if($register_user){
            $result = 2;
        } else {
            $result = 3;
        }

    }

}
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
    <title>Food Menu Admin - Register</title>
    <!-- bootstrap.min.css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- animate.css -->
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <!-- material fonts.css -->
    <link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet">
    <!-- nice select.css -->
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <!-- style.css -->
    <link href="style.css" rel="stylesheet">
    <!-- responsive.css -->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- theme-color.css -->
    <link href="assets/css/theme-color.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--  register area start -->
<div class="register-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <?php
                if($result == 2){
                    ?>
                    <div class="alert-single-item cta2">
                        <h4>Success - Your registration is successful. We will contact you soon. <span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                    </div>
                    <?php
                } if($result == 1){
                    ?>
                    <div class="alert-single-item cta4">
                        <h4>Warning - This email is already registered. Please use a new email. <span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                    </div>
                    <?php
                } if ($result == 3) {
                    ?>
                    <div class="alert-single-item cta5">
                        <h4>Sorry - Something went wrong<span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                    </div>
                    <?php
                }
                ?>
                <div class="register-section">
                    <div class="register-top text-center">
                        <h3>Register now!</h3>
                        <p>Create an app id to continue.</p>
                    </div>
                    <div class="register-form">
                        <form id="registrationForm" action="" method="post">
                            <p>User Full Name *</p>
                            <input type="text" name="user_name" placeholder="enter your full name" required>
                            <p>Restaurant Name *</p>
                            <input type="text" name="restaurant_name" placeholder="restaurant name" required>
                            <p>Email address *</p>
                            <input type="email" id="email" name="email" placeholder="email address" required>
                            <span id="emailCheckMessage" style="color: red"></span>
                            <p>Contact Number *</p>
                            <input type="text" name="contact_number" placeholder="contact number" required>
                            <p>What's App Number (If Available)</p>
                            <input type="text" name="whatsapp" placeholder="whatsapp number">
                            <p>Password *</p>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <p>Confirm password *</p>
                            <input type="password" id="password_confirm" name="password_confirm"
                                   placeholder="Confirm password" required>
                            <p id="message" style="color: red"></p>
                            <div class="content-check">
                            <span>
                                <input type="checkbox" id="c1" name="cb" required>
                                <label for="c1">I accept <a href="Terms"
                                                            target="_blank">Terms and Conditions</a></label>
                            </span>
                            </div>
                            <input type="submit" value="Request for Account" name="registration">
                        </form>
                    </div>
                </div>
                <span class="pull-login">Already have an account?<a href="Login"> Sign In</a></span>
            </div>
        </div>
    </div>
</div>
<!--  register area end -->
<!-- jquery.js -->
<script src="assets/js/jquery.js"></script>
<!-- jquery.popper.min.js -->
<script src="assets/js/popper.min.js"></script>
<!-- bootstrap.min.js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- main.js -->
<script src="assets/js/main.js"></script>

<script>
    document.getElementById('password_confirm').addEventListener('input', function () {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('password_confirm').value;
        var message = document.getElementById('message');

        if (password !== confirmPassword) {
            message.textContent = "Passwords do not match";
        } else {
            message.textContent = "";
        }
    });

    document.getElementById('registrationForm').addEventListener('submit', function (event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('password_confirm').value;
        var message = document.getElementById('message');

        if (password !== confirmPassword) {
            message.textContent = "Passwords do not match";
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
</body>

</html>