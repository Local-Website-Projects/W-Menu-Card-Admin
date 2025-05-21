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
    $note = $db_handle->checkValue($_POST['note']);
    $update_info = $db_handle->insertQuery("UPDATE `users` SET `admin_name`='$full_name',`restaurant_name`='$restaurant_name',`contact_number`='$contact_number',`whatsapp`='$whatsapp',`availability`='$status',`updated_at`='$updated_at',`note` = '$note' WHERE user_id = {$_SESSION['admin']}");
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


// Image compression function
function compressImage($source, $destination, $quality, $file_type) {
    if ($file_type == 'jpeg' || $file_type == 'jpg') {
        $image = imagecreatefromjpeg($source);
        imagejpeg($image, $destination, $quality);
    } elseif ($file_type == 'png') {
        $image = imagecreatefrompng($source);
        imagepng($image, $destination, 9); // max compression for PNG
    } elseif ($file_type == 'gif') {
        $image = imagecreatefromgif($source);
        imagegif($image, $destination);
    }
}

if (isset($_POST['category_edit'])) {
    $cat_id = $db_handle->checkValue($_POST['cat_id']);
    $cat_name = $db_handle->checkValue($_POST['cat_name']);
    $image = '';
    $query = '';
    $updated_at = date("Y-m-d H:i:s"); // You can set this however you prefer

    if (!empty($_FILES['cat_image']['name'])) {
        $original_file_name = $_FILES['cat_image']['name'];
        $file_tmp = $_FILES['cat_image']['tmp_name'];
        $file_size = $_FILES['cat_image']['size'];
        $file_ext = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

        // Allowed extensions
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        // Check if file is an actual image
        $check = getimagesize($file_tmp);

        if ($check !== false && in_array($file_ext, $allowed_ext)) {
            // Generate a safe random filename
            $RandomAccountNumber = mt_rand(1, 99999);
            $safe_file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
            $file_name = $RandomAccountNumber . "_" . $safe_file_name;
            $destination_path = "cat_image/" . $file_name;

            // Delete old image if exists
            $data = $db_handle->runQuery("SELECT * FROM `category` WHERE cat_id ='{$cat_id}'");
            if (!empty($data[0]['cat_image']) && file_exists($data[0]['cat_image'])) {
                unlink($data[0]['cat_image']);
            }

            // Compress and move new image
            compressImage($file_tmp, $destination_path, 85, $file_ext);
            $image = $destination_path;
            $query .= ", `cat_image`='" . $image . "'";
        } else {
            $_SESSION['alert'] = 'danger';
            echo "<script>alert('Invalid image file.'); window.location.href = 'Category';</script>";
            exit();
        }
    }

    // Update category
    $update_cat = $db_handle->insertQuery("UPDATE `category` SET `category_name`='$cat_name', `updated_at`='$updated_at' $query WHERE cat_id = '$cat_id'");

    if ($update_cat) {
        $_SESSION['alert'] = 'success';
    } else {
        $_SESSION['alert'] = 'danger';
    }

    echo "<script>window.location.href = 'Category';</script>";
    exit();
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
    $popular = $db_handle->checkValue($_POST['popular']);
    $image = '';
    $query = '';
    if (!empty($_FILES['item_image']['name'])) {
        $original_file_name = $_FILES['item_image']['name'];
        $file_tmp = $_FILES['item_image']['tmp_name'];
        $file_size = $_FILES['item_image']['size'];
        $file_ext = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

        // Allowed extensions
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        // Check if file is an actual image
        $check = getimagesize($file_tmp);

        if ($check !== false && in_array($file_ext, $allowed_ext)) {
            // Generate a safe random filename
            $RandomAccountNumber = mt_rand(1, 99999);
            $safe_file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
            $file_name = $RandomAccountNumber . "_" . $safe_file_name;
            $destination_path = "item_image/" . $file_name;

            // Delete old image if exists
            $data = $db_handle->runQuery("SELECT * FROM `category` WHERE cat_id ='{$cat_id}'");
            if (!empty($data[0]['item_image']) && file_exists($data[0]['item_image'])) {
                unlink($data[0]['item_image']);
            }

            // Compress and move new image
            compressImage($file_tmp, $destination_path, 85, $file_ext);
            $image = $destination_path;
            $query .= ", `item_image`='" . $image . "'";
        } else {
            $_SESSION['alert'] = 'danger';
            echo "<script>alert('Invalid image file.'); window.location.href = 'Category';</script>";
            exit();
        }
    }

    $update_item = $db_handle->insertQuery("UPDATE `items` SET `item_name`='$item_name',`item_price`='$item_price',`short_desc`='$short_desc',`updated_at`='$updated_at',`cat_id` = '$cat_id',`popular` = '$popular' $query WHERE item_id = '$item_id'");
    if($update_item){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href='Item';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href='Item';</script>";
    }
}


if(isset($_GET['location_id'])){
    $location_id = $_GET['location_id'];
    $status = $_GET['status'];
    $update_location_status = $db_handle->insertQuery("UPDATE `locations` SET `status`='$status',`updated_at`='$updated_at' WHERE `location_id` = '$location_id'");
    if($update_location_status){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href='Locations';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href='Locations';</script>";
    }
}

if(isset($_POST['location_edit'])){
    $location_name = $db_handle->checkValue($_POST['location_name']);
    $location_id = $db_handle->checkValue($_POST['location_id']);
    $update_location = $db_handle->insertQuery("UPDATE `locations` SET `location_name`='$location_name',`updated_at`='$updated_at' WHERE `location_id` = '$location_id'");
    if($update_location){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href='Locations';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href='Locations';</script>";
    }
}