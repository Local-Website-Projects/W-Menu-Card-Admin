<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");

if(!isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Login';
    </script>
    ";
}

$_SESSION['alert'] = '';



function compressImage($source, $destination, $quality, $file_type) {
    if ($file_type == 'jpeg' || $file_type == 'jpg') {
        $image = imagecreatefromjpeg($source);
        imagejpeg($image, $destination, $quality); // quality: 0 (worst) to 100 (best)
    } elseif ($file_type == 'png') {
        $image = imagecreatefrompng($source);
        imagepng($image, $destination, 9); // compression: 0 (no compression) to 9
    }
}


if(isset($_POST['add_category'])) {
    $cat_name = $db_handle->checkValue($_POST['cat_name']);
    $image = '';
    if (!empty($_FILES['cat_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $original_file_name = $_FILES['cat_image']['name'];
        $file_tmp = $_FILES['cat_image']['tmp_name'];

        $file_ext = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
        $file_name = $RandomAccountNumber . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name); // clean filename

        $destination_path = "cat_image/" . $file_name;

        if ($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg") {
            $_SESSION['alert'] = 'danger';
            echo "<script>window.location.href = 'Category';</script>";
            exit();
        } else {
            // Compress and move image
            compressImage($file_tmp, $destination_path, 85, $file_ext); // Adjust quality (85 is a good balance)
            $image = $destination_path;
        }

        $add_category = $db_handle->insertQuery("INSERT INTO `category`(`user_id`, `category_name`,`cat_image`, `inserted_at`) VALUES ('{$_SESSION['admin']}','$cat_name','$image','$inserted_at')");
        if ($add_category) {
            $_SESSION['alert'] = 'success';
        } else {
            $_SESSION['alert'] = 'danger';
        }
        echo "<script>window.location.href = 'Category';</script>";
        exit();
    } else{
        $add_category = $db_handle->insertQuery("INSERT INTO `category`(`user_id`, `category_name`,`inserted_at`) VALUES ('{$_SESSION['admin']}','$cat_name','$inserted_at')");
        if ($add_category) {
            $_SESSION['alert'] = 'success';
        } else {
            $_SESSION['alert'] = 'danger';
        }
        echo "<script>window.location.href = 'Category';</script>";
        exit();
    }
}




if(isset($_POST['add_item'])){
    $item_name = $db_handle->checkValue($_POST['item_name']);
    $item_price = $db_handle->checkValue($_POST['item_price']);
    $short_desc = $db_handle->checkValue($_POST['short_desc']);
    $cat_id = $db_handle->checkValue($_POST['cat_id']);
    $popular = $db_handle->checkValue($_POST['popular']);
    $image = '';
    if (!empty($_FILES['item_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $original_file_name = $_FILES['item_image']['name'];
        $file_tmp = $_FILES['item_image']['tmp_name'];

        $file_ext = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
        $file_name = $RandomAccountNumber . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name); // clean filename

        $destination_path = "item_image/" . $file_name;

        if ($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg") {
            $_SESSION['alert'] = 'danger';
            echo "<script>window.location.href = 'Item';</script>";
            exit();
        } else {
            // Compress and move image
            compressImage($file_tmp, $destination_path, 85, $file_ext); // Adjust quality (85 is a good balance)
            $image = $destination_path;
        }

        $insert_item = $db_handle->insertQuery("INSERT INTO `items`(`user_id`, `item_name`,`item_image`, `item_price`, `short_desc`, `inserted_at`,`cat_id`,`popular`) VALUES ('{$_SESSION['admin']}','$item_name','$image','$item_price','$short_desc','$inserted_at','$cat_id','$popular')");
        if($insert_item){
            $_SESSION['alert'] = 'success';
        } else {
            $_SESSION['alert'] = 'danger';
        }
        echo "<script>window.location.href = 'Item';</script>";
        exit();
    }
}





if(isset($_POST['add_location'])){
    $location = $db_handle->checkValue($_POST['location']);

    $insert_item = $db_handle->insertQuery("INSERT INTO `locations`(`location_name`, `inserted_at`) VALUES ('$location','$inserted_at')");
    if($insert_item){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href = 'Locations';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href = 'Locations';</script>";
    }
}