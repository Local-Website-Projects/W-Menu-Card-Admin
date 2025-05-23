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
    <title>Food Menu Admin - Items</title>
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
                }
                ?>
            </div>

            <?php
            if (isset($_GET['edit'])) {
                $items = $db_handle->runQuery("select * from items,category where item_id = {$_GET['edit']} and items.cat_id = category.cat_id");
                ?>
                <div class="row">
                    <div class="col-12">
                        <h3>Edit Category</h3>
                        <div class="form-basic form-shadow">
                            <form action="Update" method="post">
                                <p>Item Name</p>
                                <input type="hidden" value="<?php echo $_GET['edit']; ?>" name="item_id">
                                <input type="text" value="<?php echo $items[0]['item_name']; ?>" name="item_name" autocomplete="off"
                                       required>
                                <p>Item Price</p>
                                <input type="text" value="<?php echo $items[0]['item_price']; ?>" name="item_price" autocomplete="off"
                                       required>
                                <p>Item Image (Recommended ratio 150*150)</p>
                                <input type="file" name="item_image" accept="image/*">
                                <img src="<?php echo $items[0]['item_image'];?>" height="100px" width="auto">
                                <p>Select Category</p>
                                <select name="cat_id" class="form-control" required>
                                    <option value="<?php echo $items[0]['cat_id'];?>" selected><?php echo $items[0]['category_name'];?></option>
                                    <?php
                                    $fetch_cat = $db_handle->runQuery("select * from category where user_id = {$_SESSION['admin']} and status = 1");
                                    for($i=0; $i<count($fetch_cat); $i++){
                                        ?>
                                        <option value="<?php echo $fetch_cat[$i]['cat_id'];?>"><?php echo $fetch_cat[$i]['category_name'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                <p>Select As Popular</p>
                                <select name="popular" class="form-control" required>
                                    <option value="0" <?php if($items[0]['popular'] == '0') echo 'selected';?>>No</option>
                                    <option value="1" <?php if($items[0]['popular'] == '1') echo 'selected';?>>Yes</option>
                                </select>

                                <p>Short Description</p>
                                <input type="text" value="<?php echo $items[0]['short_desc']; ?>" name="short_desc" autocomplete="off"
                                       required>
                                <input type="submit" name="update_item" value="Update Item">
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
                            <h3>Items</h3>
                            <div class="notification-right3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal22">
                                    Add Item
                                </button>
                                <!-- Modal -->
                                <div class="modal modal-center fade" id="exampleModal22" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLongTitle22" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle22">Add Item</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-basic form-shadow">
                                                    <form action="Insert" method="post" enctype="multipart/form-data">
                                                        <p>Item Name</p>
                                                        <input type="text" placeholder="Item Name" name="item_name" autocomplete="off"
                                                               required>
                                                        <p>Item Price</p>
                                                        <input type="text" placeholder="Item Price" name="item_price" autocomplete="off"
                                                               required>
                                                        <p>Item Image (Recommended ratio 150*150)</p>
                                                        <input type="file" name="item_image" accept="image/*"
                                                               required>
                                                        <p>Select Category</p>
                                                            <select name="cat_id" class="form-control" required>
                                                                <option value="#">Select item category</option>
                                                                <?php
                                                                $fetch_cat = $db_handle->runQuery("select * from category where user_id = {$_SESSION['admin']} and status = 1");
                                                                $fetch_cat_no = $db_handle->numRows("select * from category where user_id = {$_SESSION['admin']} and status = 1");
                                                                for($i=0; $i<$fetch_cat_no; $i++){
                                                                    ?>
                                                                    <option value="<?php echo $fetch_cat[$i]['cat_id'];?>"><?php echo $fetch_cat[$i]['category_name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        <p>Select As Popular</p>
                                                        <select name="popular" class="form-control" required>
                                                            <option value="0" selected>No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                        <p>Short Description</p>
                                                        <input type="text" placeholder="Short Description"
                                                               name="short_desc" autocomplete="off"
                                                               required>
                                                        <input type="submit" name="add_item" value="Add Item">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
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
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Item Image</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Popular</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $fetch_item = $db_handle->runQuery("select items.item_id, items.item_name,items.popular, items.item_price,items.item_image, items.short_desc,items.status,category.category_name from items,category where items.user_id = {$_SESSION['admin']} and items.cat_id = category.cat_id order by items.item_id desc");
                            $fetch_item_no = $db_handle->numRows("select items.item_id, items.item_name, items.item_price, items.item_image, items.short_desc,items.status,category.category_name from items,category where items.user_id = {$_SESSION['admin']} and items.cat_id = category.cat_id order by items.item_id desc");
                            for ($i = 0; $i < $fetch_item_no; $i++) {
                                ?>
                                <tr>
                                    <th><?php echo $i + 1; ?></th>
                                    <td><?php echo $fetch_item[$i]['item_name']; ?></td>
                                    <td><?php echo $fetch_item[$i]['item_price']; ?></td>
                                    <td><img src="<?php echo $fetch_item[$i]['item_image'];?>" height="50px" width="auto"></td>
                                    <td><?php echo $fetch_item[$i]['category_name']; ?></td>
                                    <td><?php echo $fetch_item[$i]['short_desc']; ?></td>
                                    <td><?php if($fetch_item[$i]['popular'] == 1) echo 'yes'; else echo 'No';?></td>
                                    <td><?php
                                        if ($fetch_item[$i]['status'] == 1) {
                                            ?>
                                            <a href="Update?item_id=<?php echo $fetch_item[$i]['item_id']; ?>&status=0"
                                               class="dflt-btn success">Active</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="Update?item_id=<?php echo $fetch_item[$i]['item_id']; ?>&status=1"
                                               class="dflt-btn danger">Deactive</a>
                                            <?php
                                        }
                                        ?>

                                    </td>
                                    <td><a href="Item?edit=<?php echo $fetch_item[$i]['item_id']; ?>"><i
                                                    class="zmdi zmdi-edit"></i></a></td>
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