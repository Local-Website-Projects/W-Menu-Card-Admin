<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$_SESSION['alert'] = '';

if(isset($_POST['login'])){
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);
    $select_user = $db_handle->runQuery("select * from users where admin_email = '$email' and status = '1'");
    if(count($select_user) > 0) {
        $hashed_password = $select_user[0]['admin_password'];
        if (password_verify($password, $hashed_password)) {
            $_SESSION['admin'] = $select_user[0]['user_id'];
            $_SESSION['alert'] = 'login_success';
            if($select_user[0]['type'] == '1'){
                echo "
        <script>
        window.location.href = 'Category';
</script>
        ";
            } else {
                echo "
        <script>
        window.location.href = 'Home';
</script>
        ";
            }

        } else {
            $_SESSION['alert'] = 'error';
        }
    } else {
        $_SESSION['alert'] = 'error-email';
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
    <title>Food Menu Admin - Login</title>
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
                    if($_SESSION['alert'] == 'error'){
                        ?>
                        <div class="alert-single-item cta5">
                            <h4>Sorry - Password do not match<span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                        </div>
                        <?php
                        unset($_SESSION['alert']);
                    } if($_SESSION['alert'] == 'error-email'){
                        ?>
                        <div class="alert-single-item cta5">
                            <h4>Sorry - Email does not match. <span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                        </div>
                        <?php
                        unset($_SESSION['alert']);
                    }
                    ?>
                    <div class="register-section">
                        <div class="register-top text-center">
                            <h3>Welcome back!</h3>
                            <p>Sign in with your email to continue.</p>
                        </div>
                        <div class="register-form">
                            <form action="" method="post">
                                <p>Email address</p>
                                <input type="email" name="email" placeholder="email address" required>
                                <p>Password</p>
                                <input type="password" name="password" placeholder="Password" required>
                                <input type="submit" name="login" value="Login">
                            </form>
                        </div>
                    </div>
                    <span class="pull-login cta"><a href="forget.html">Forgot password?</a></span>
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
</body>

</html>