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
                    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'success'){
                        ?>
                        <div class="col-12">
                            <div class="alert-single-item cta2">
                                <h4>Success - Login Successful<span class="alert-close"><i class="zmdi zmdi-close"></i></span></h4>
                            </div>
                        </div>
                        <?php
                        unset($_SESSION['alert']);
                    } ?>
                    <div class="col-md-12">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single">
                            <span class="sec_icon"><i class="zmdi zmdi-money"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Daily sales</h4>
                                <h3>$30, <span class="single-count">305</span></h3>
                            </div>
                            <p>Total items sold <span class="fl_right">GOOD <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single cta2">
                            <span class="sec_icon"><i class="zmdi zmdi-accounts"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Visitors</h4>
                                <h3>75,<span class="single-count">843</span></h3>
                            </div>
                            <p>Visitors <span class="fl_right">NORMAL <i class="zmdi zmdi-long-arrow-down"></i></span></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single cta3">
                            <span class="sec_icon"><i class="zmdi zmdi-email"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Messages</h4>
                                <h3><span class="single-count">1224</span></h3>
                            </div>
                            <p>Last month <span class="fl_right">NORMAL <i class="zmdi zmdi-long-arrow-down"></i></span></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="homepage-sec1-single cta4">
                            <span class="sec_icon"><i class="zmdi zmdi-favorite"></i></span>
                            <div class="homepage-sec1-fl-right">
                                <h4>Followers</h4>
                                <h3>+<span class="single-count">38</span>K</h3>
                            </div>
                            <p>Update now<span class="fl_right">UPDATE <i class="zmdi zmdi-refresh"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Homepage sec 1 end -->
        <!--  Homepage sec 2 start -->
        <div class="homepage-sec2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="home-line-chart">
                            <h3>Weekly stats</h3>
                            <canvas id="lineChart"></canvas>
                        </div>
                        <div class="home_map_area">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box-body">
                                        <div id="world-map" style="height: 250px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="home_gl_table">
                                        <h3>Global sales</h3>
                                        <table class="home_gl_table_row">
                                            <thead>
                                                <tr>
                                                    <th class="gl_table">
                                                        <img src="assets/img/global-sales-icon1.png" alt="">
                                                    </th>
                                                    <th class="gl_table"><span class="float-left_">USA</span></th>
                                                    <th class="gl_table"><span class="center_">2.920</span></th>
                                                    <th class="gl_table"><span class=" float-right_">54.18%</span></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="home_gl_table_row">
                                            <thead>
                                                <tr>
                                                    <th class="gl_table">
                                                        <img src="assets/img/global-sales-icon2.png" alt="">
                                                    </th>
                                                    <th class="gl_table"><span class="float-left_">Germany</span></th>
                                                    <th class="gl_table"><span class="center_">2.920</span></th>
                                                    <th class="gl_table"><span class=" float-right_">21.53%</span></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="home_gl_table_row">
                                            <thead>
                                                <tr>
                                                    <th class="gl_table">
                                                        <img src="assets/img/global-sales-icon3.png" alt="">
                                                    </th>
                                                    <th class="gl_table"><span class="float-left_">France</span></th>
                                                    <th class="gl_table"><span class="center_">2.920</span></th>
                                                    <th class="gl_table"><span class=" float-right_">13.86%</span></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="home_gl_table_row">
                                            <thead>
                                                <tr>
                                                    <th class="gl_table">
                                                        <img src="assets/img/global-sales-icon4.png" alt="">
                                                    </th>
                                                    <th class="gl_table"><span class="float-left_">United-kingdom</span></th>
                                                    <th class="gl_table"><span class="center_">2.920</span></th>
                                                    <th class="gl_table"><span class=" float-right_">07.37%</span></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="home_gl_table_row">
                                            <thead>
                                                <tr>
                                                    <th class="gl_table">
                                                        <img src="assets/img/global-sales-icon5.png" alt="">
                                                    </th>
                                                    <th class="gl_table"><span class="float-left_">Brazil</span></th>
                                                    <th class="gl_table"><span class="center_">2.920</span></th>
                                                    <th class="gl_table"><span class=" float-right_">03.23%</span></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home_bar">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="home_right_client">
                            <h3>New Client</h3>
                            <div class="home_right_single_cl">
                                <img src="assets/img/client-img1.png" alt="">
                                <div class="home_client_text">
                                    <h5><a href="#"> Dickens</a></h5>
                                    <p>10 Minit ago</p>
                                </div>
                            </div>
                            <div class="home_right_single_cl">
                                <img src="assets/img/client-img2.png" alt="">
                                <div class="home_client_text">
                                    <h5> <a href="#">Powlowski</a></h5>
                                    <p>5 Minit ago</p>
                                </div>
                            </div>
                            <div class="home_right_single_cl">
                                <img src="assets/img/client-img3.png" alt="">
                                <div class="home_client_text">
                                    <h5><a href="#">Mathew </a></h5>
                                    <p>6 Minit ago</p>
                                </div>
                            </div>
                            <div class="home_right_single_cl">
                                <img src="assets/img/client-img4.png" alt="">
                                <div class="home_client_text">
                                    <h5><a href="#">Alice</a></h5>
                                    <p>8 Minit ago</p>
                                </div>
                            </div>
                            <div class="home_right_single_cl">
                                <img src="assets/img/client-img5.png" alt="">
                                <div class="home_client_text">
                                    <h5><a href="#">Delbert</a></h5>
                                    <p>12 Minit ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="home_right_pie">
                            <h3>Email Statistics</h3>
                            <canvas id="Homepie" style="width: 200px; height: 200px;"></canvas>
                        </div>
                        <div class="home_right_admin text-center">
                            <img src="assets/img/home-right-admin-img.png" alt="">
                            <h5>Susana Weber</h5>
                            <p>Ui Designer at Crazycafe</p>
                            <span>London, United Kingdom</span>
                            <div class="home_right-admin_social">
                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a href="#"><i class="zmdi zmdi-linkedin"></i></a>
                            </div>
                            <a href="#" class="home_right_a_btn">View profile</a>
                            <a href="#" class="home_right_a_btn">Edit profile</a>
                            <div class="home_right_admin-count">
                                <div class="home_right_single_count">
                                    <h4 class="s_count">55</h4>
                                    <p>Reiview</p>
                                </div>
                                <div class="home_right_single_count">
                                    <h4 class="s_count">83</h4>
                                    <p>Clients</p>
                                </div>
                                <div class="home_right_single_count">
                                    <h4 class="s_count">360</h4>
                                    <p>Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home_table_area form-shadow">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="home_table_title">
                                <h3>Latest Projects</h3>
                            </div>
                        </div>
                    </div>
                    <div class="basic-table cta">
                        <div class="row">
                            <div class="col-lg-12 table_basic1">
                                <table class="responsive-table-input-matrix">
                                    <thead>
                                        <tr>
                                            <th>Project Id</th>
                                            <th>Project Name</th>
                                            <th>Start Date</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Assign</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Web design</td>
                                            <td>01 Jan 2018</td>
                                            <td>12 Jan 2018</td>
                                            <td><a class="active_c" href="#">Active</a></td>
                                            <td>Turcotte</td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>App design</td>
                                            <td>03 May 2018</td>
                                            <td>23 Jul 2018</td>
                                            <td><a class="active_c" href="#">Active</a></td>
                                            <td>Legros</td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>Deshboard design</td>
                                            <td>23 Feb 2018</td>
                                            <td>12 Mar 2018</td>
                                            <td><a class="cooming_soon" href="#">Disabaled</a></td>
                                            <td>Parker</td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>Product design</td>
                                            <td>23 Jul 2018</td>
                                            <td>26 Aug 2018</td>
                                            <td><a class="progres" href="#">Suspended</a></td>
                                            <td>Harber</td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>E-comerce design</td>
                                            <td>13 Jul 2018</td>
                                            <td>19 Sep 2018</td>
                                            <td><a class="active_c" href="#">Active</a></td>
                                            <td>Beatty</td>
                                        </tr>
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