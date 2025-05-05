<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");

if(isset($_GET['id']) && $_GET['id'] != ""){
    $update_status = $db_handle->insertQuery("UPDATE `users` SET `status`={$_GET['status']} WHERE `user_id`={$_GET['id']}");
    if($update_status){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href = 'Home';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href = 'Home';</script>";
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
    <title>Food Menu Admin - Home</title>
    <?php include ('include/css.php');?>
</head>

<body>
    <!--  page loader -->
    <?php include ('include/preloader.php');?>
    <!--  page loader end -->


    <!--  custom theme area start -->
    <?php /*include ('include/theme.php');*/?>
    <!--  custom theme area end -->


    <!--  Header area start -->
    <?php include ('include/header.php');?>
    <!--  Header area end -->



    <!--  Nav menu area start -->
    <?php include ('include/navbar.php');?>
    <!-- /.dash-navbar-left -->


    <!--  Homepage sec 1 start -->
    <div class="main-wraper-bg mar_lft_282">
        <div class="homepage-sec1">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'login_success'){
                        ?>
                        <div class="col-12">
                            <div class="alert-single-item cta2">
                                <h4>Success - Login Successful<span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                            </div>
                        </div>
                        <?php
                        unset($_SESSION['alert']);
                    }
                    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'success'){
                        ?>
                        <div class="col-12">
                            <div class="alert-single-item cta2">
                                <h4>Request performed successfully<span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-12">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single">
                            <span class="sec_icon"><i class="zmdi zmdi-accounts"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Total Register Restaurant</h4>
                                <?php
                                $total_restaurant = $db_handle->runQuery("select COUNT(user_id) as num from users where type = 1");
                                ?>
                                <h3><?php echo $total_restaurant[0]['num'];?></h3>
                            </div>
                            <p>Total Restaurant</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single cta2">
                            <span class="sec_icon"><i class="zmdi zmdi-accounts"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Total Items</h4>
                                <?php
                                $total_items = $db_handle->runQuery("select COUNT(item_id) as item from items");
                                ?>
                                <h3><?php echo $total_items[0]['item'];?></h3>
                            </div>
                            <p>Total items</span></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single cta3">
                            <span class="sec_icon"><i class="zmdi zmdi-email"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Total Active Restaurant</h4>
                                <?php
                                $total_restaurant = $db_handle->runQuery("select COUNT(user_id) as avl from users where type = 1 and availability = 1");
                                ?>
                                <h3><?php echo $total_restaurant[0]['avl'];?></h3>
                            </div>
                            <p>Total active restaurant</span></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single cta4">
                            <span class="sec_icon"><i class="zmdi zmdi-favorite"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Total Active Items</h4>
                                <?php
                                $total_items = $db_handle->runQuery("select COUNT(item_id) as item from items where status = 1");
                                ?>
                                <h3><?php echo $total_items[0]['item'];?></h3>
                            </div>
                            <p>Total active items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Homepage sec 1 end -->
        <!--  Homepage sec 2 start -->
        <div class="homepage-sec2">
            <div class="container-fluid">
                <div class="home_table_area form-shadow">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="home_table_title">
                                <h3>Latest Restaurants</h3>
                            </div>
                        </div>
                    </div>
                    <div class="basic-table cta">
                        <div class="row">
                            <div class="col-lg-12 table_basic1">
                                <table class="responsive-table-input-matrix">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>User Name</th>
                                            <th>Restaurant Name</th>
                                            <th>Phone</th>
                                            <th>Whatsapp</th>
                                            <th>Registration Date</th>
                                            <th>Bill Due Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $fetch_all_user = $db_handle->runQuery("select * from users where type = 1 order by user_id desc");
                                    $fetch_all_user_no = $db_handle->numRows("select * from users where type = 1 order by user_id desc");
                                    for($i=0; $i<$fetch_all_user_no; $i++){
                                        ?>
                                        <tr>
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $fetch_all_user[$i]['admin_name'];?></td>
                                            <td><?php echo $fetch_all_user[$i]['restaurant_name'];?></td>
                                            <td><?php echo $fetch_all_user[$i]['contact_number'];?></td>
                                            <td><?php echo $fetch_all_user[$i]['whatsapp'];?></td>
                                            <td><?php
                                                $registration_date = $fetch_all_user[$i]['registration_date'];
                                                $dateObj = new DateTime($registration_date);
                                                $formatted_date = $dateObj->format('d F, Y');
                                                echo $formatted_date;?></td>
                                            <td><?php $registration_date = $fetch_all_user[$i]['registration_date'];
                                                $dateObj = new DateTime($registration_date);
                                                $formatted_date = $dateObj->format('d');
                                                echo $formatted_date;?><sup>th</sup> Per Month</td>
                                            <?php
                                            if($fetch_all_user[$i]['status'] == 0){
                                                ?>
                                                <td><a class=cooming_soon href="Home?id=<?php echo $fetch_all_user[$i]['user_id'];?>&status=1">Deactive</a></td>
                                                <?php
                                            } if($fetch_all_user[$i]['status'] == 1){
                                                ?>
                                                <td><a class="active_c" href="Home?id=<?php echo $fetch_all_user[$i]['user_id'];?>&status=0">Active</a></td>
                                                <?php
                                            }
                                            ?>

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Homepage sec 2 end -->


    <!-- footer area start -->
    <?php include ('include/footer.php');?>
    <!-- footer area end -->


<?php include ('include/js.php');?>
</body>


</html>