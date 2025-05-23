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
    <title>Food Menu Admin - Locations</title>
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
                            <h4>Sorry - Something went wrong<span class="alert-close"><i
                                        class="zmdi zmdi-close"></i></span></h4>
                        </div>
                    </div>
                    <?php
                    unset($_SESSION['alert']);
                } if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'login_success') {
                    ?>
                    <div class="col-12">
                        <div class="alert-single-item cta2">
                            <h4>Welcome Back<span class="alert-close"><i
                                        class="zmdi zmdi-close"></i></span></h4>
                        </div>
                    </div>
                    <?php
                }unset($_SESSION['alert']);
                ?>
            </div>

            <?php
            if(isset($_GET['edit'])){
                $cat = $db_handle->runQuery("select * from locations where location_id = {$_GET['edit']}");
                ?>
                <div class="row">
                    <div class="col-12">
                        <h3>Edit Location</h3>
                        <div class="form-basic form-shadow">
                            <form action="Update" method="post">
                                <p>Location</p>
                                <input type="text" name="location_name" value="<?php echo $cat[0]['location_name'];?>" autocomplete="off"
                                       required>
                                <input type="hidden" value="<?php echo $_GET['edit']?>" name="location_id">
                                <input type="submit" name="location_edit" value="Update Location">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-top cta2">
                            <h3>Locations</h3>
                            <div class="notification-right3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal22">
                                    Add Location
                                </button>
                                <!-- Modal -->
                                <div class="modal modal-center fade" id="exampleModal22" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLongTitle22" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle22">Add Location</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-basic form-shadow">
                                                    <form action="Insert" method="post">
                                                        <p>Location</p>
                                                        <input type="text" placeholder="Location" name="location" autocomplete="off"
                                                               required>
                                                        <input type="submit" name="add_location" value="Add Location">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Modal end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Location</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $fetch_cat = $db_handle->runQuery("select * from locations order by location_id desc");
                            $fetch_cat_no = $db_handle->numRows("select * from locations order by location_id desc");
                            for($i=0; $i<$fetch_cat_no; $i++){
                                ?>
                                <tr>
                                    <th><?php echo $i+1;?></th>
                                    <td><?php echo $fetch_cat[$i]['location_name'];?></td>
                                    <td><?php
                                        if($fetch_cat[$i]['status'] == 1){
                                            ?>
                                            <a href="Update?location_id=<?php echo $fetch_cat[$i]['location_id'];?>&status=0" class="dflt-btn success">Active</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="Update?location_id=<?php echo $fetch_cat[$i]['location_id'];?>&status=1" class="dflt-btn danger">Deactive</a>
                                            <?php
                                        }
                                        ?>

                                    </td>
                                    <td><a href="Locations?edit=<?php echo $fetch_cat[$i]['location_id'];?>"><i class="zmdi zmdi-edit"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>


<!-- footer area start -->
<?php include('include/footer.php'); ?>
<!-- footer area end -->


<?php include('include/js.php'); ?>
<script>
    document.getElementById("confirm_new_password").addEventListener("input", function () {
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