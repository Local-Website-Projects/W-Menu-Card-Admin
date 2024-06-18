<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$updated_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");

$_SESSION['alert'] = '';

if (!isset($_SESSION['admin'])) {
    echo "
    <script>
    window.location.href = 'Login';
    </script>
    ";
}

if(isset($_POST['personal_info_update'])){
    $full_name = $db_handle->checkValue($_POST['full_name']);
    $restaurant_name = $db_handle->checkValue($_POST['restaurant_name']);
    $contact_number = $db_handle->checkValue($_POST['contact_number']);
    $whatsapp = $db_handle->checkValue($_POST['whatsapp']);
    $status = $db_handle->checkValue($_POST['status']);
    $update_info = $db_handle->insertQuery("UPDATE `users` SET `admin_name`='$full_name',`restaurant_name`='$restaurant_name',`contact_number`='$contact_number',`whatsapp`='$whatsapp',`availability`='$status',`updated_at`='$updated_at' WHERE user_id = {$_SESSION['admin']}");
    if($update_info){
        $_SESSION['alert'] = 'success';
        echo "
        <script>
        window.location.href = 'Profile';
</script>
        ";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "
        <script>
        window.location.href = 'Profile';
</script>
        ";
    }
}

if(isset($_POST['confirm_new_password'])){
    $old_password = $db_handle->checkValue($_POST['old_password']);
    $new_password = $db_handle->checkValue($_POST['new_password']);
    $confirm_new_password = $db_handle->checkValue($_POST['confirm_new_password']);
    $hashed_password = password_hash($confirm_new_password, PASSWORD_DEFAULT);

    $select_user = $db_handle->runQuery("select * from users where user_id = {$_SESSION['admin']}");
    $password = $select_user[0]['password'];
    if(password_verify($old_password, $password)){
        $update_pass = $db_handle->insertQuery("UPDATE `users` SET `admin_password`='$hashed_password',`updated_at`='[value-13]' WHERE user_id = {$_SESSION['admin']}");
        $_SESSION['alert'] = 'success';
        echo "
        <script>
        window.location.href = 'Profile';
</script>
        ";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "
        <script>
        window.location.href = 'Profile';
</script>
        ";
    }
}

if(isset($_POST['update_contact_info'])){
    $address = $db_handle->checkValue($_POST['address']);
    $contact_number_one = $db_handle->checkValue($_POST['contact_number_one']);
    $contact_number_two = $db_handle->checkValue($_POST['contact_number_two']);
    $email_one = $db_handle->checkValue($_POST['email_one']);
    $email_two = $db_handle->checkValue($_POST['email_two']);
    $facebook = $db_handle->checkValue($_POST['facebook']);
    $insta = $db_handle->checkValue($_POST['insta']);
    $youtube = $db_handle->checkValue($_POST['youtube']);
    $website = $db_handle->checkValue($_POST['website']);

    $check = $db_handle->numRows("select * from restaurant_contact where user_id = {$_SESSION['admin']}");
    if($check > 0){
        $update_contact = $db_handle->insertQuery("UPDATE `restaurant_contact` SET `address`='$address',`contact_number_one`='$contact_number_one',`contact_number_two`='$contact_number_two',`email_one`='$email_one',`email_two`='$email_two',`facebook`='$facebook',`insta`='$insta',`youtube`='$youtube',`website`='$website',`updated_at`='$updated_at' WHERE user_id = {$_SESSION['admin']}");
        if($update_contact){
            $_SESSION['alert'] = 'success';
            echo "
        <script>
        window.location.href = 'Setting';
</script>
        ";
        } else {
            $_SESSION['alert'] = 'danger';
            echo "
        <script>
        window.location.href = 'Setting';
</script>
        ";
        }
    } else {
        $insert_info = $db_handle->insertQuery("INSERT INTO `restaurant_contact`(`user_id`, `address`, `contact_number_one`, `contact_number_two`, `email_one`, `email_two`, `facebook`, `insta`, `youtube`, `website`, `inserted_at`) VALUES ('{$_SESSION['admin']}','$address','$contact_number_one','$contact_number_two','$email_one','$email_two','$facebook','$insta','$youtube','$website','$updated_at')");
        if($insert_info){
            $_SESSION['alert'] = 'success';
            echo "
        <script>
        window.location.href = 'Setting';
</script>
        ";
        } else {
            $_SESSION['alert'] = 'danger';
            echo "
        <script>
        window.location.href = 'Setting';
</script>
        ";
        }
    }
}


if(isset($_POST['category_edit'])){
    $cat_id = $db_handle->checkValue($_POST['cat_id']);
    $cat_name = $db_handle->checkValue($_POST['cat_name']);
    $update_cat = $db_handle->insertQuery("UPDATE `category` SET `category_name`='$cat_name',`updated_at`='$updated_at' WHERE cat_id = '$cat_id'");
    if($update_cat){
        $_SESSION['alert'] = 'success';
        echo "
        <script>
        window.location.href = 'Category';
</script>
        ";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "
        <script>
        window.location.href = 'Category';
</script>
        ";
    }
}


if(isset($_GET['id']) && isset($_GET['status'])){
    $update_cat_status = $db_handle->insertQuery("UPDATE `category` SET `status`='{$_GET['status']}',`updated_at`='$updated_at' WHERE cat_id = {$_GET['id']}");
    if($update_cat_status){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href='Category';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href='Category';</script>";
    }
}


if(isset($_GET['item_id']) && isset($_GET['status'])){
    $update_cat_status = $db_handle->insertQuery("UPDATE `items` SET `status`='{$_GET['status']}',`updated_at`='$updated_at' WHERE item_id = {$_GET['item_id']}");
    if($update_cat_status){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href='Item';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href='Item';</script>";
    }
}


if(isset($_POST['update_item'])){
    $item_name = $db_handle->checkValue($_POST['item_name']);
    $item_price = $db_handle->checkValue($_POST['item_price']);
    $short_desc = $db_handle->checkValue($_POST['short_desc']);
    $item_id = $db_handle->checkValue($_POST['item_id']);
    $cat_id = $db_handle->checkValue($_POST['cat_id']);
    $update_item = $db_handle->insertQuery("UPDATE `items` SET `item_name`='$item_name',`item_price`='$item_price',`short_desc`='$short_desc',`updated_at`='$updated_at',`cat_id` = '$cat_id' WHERE item_id = '$item_id'");
    if($update_item){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href='Item';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href='Item';</script>";
    }
}