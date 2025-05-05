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


if(isset($_POST['add_category'])){
    $cat_name = $db_handle->checkValue($_POST['cat_name']);
    $add_category = $db_handle->insertQuery("INSERT INTO `category`(`user_id`, `category_name`, `inserted_at`) VALUES ('{$_SESSION['admin']}','$cat_name','$inserted_at')");
    if($add_category){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href = 'Category';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href = 'Category';</script>";
    }
}

if(isset($_POST['add_item'])){
    $item_name = $db_handle->checkValue($_POST['item_name']);
    $item_price = $db_handle->checkValue($_POST['item_price']);
    $short_desc = $db_handle->checkValue($_POST['short_desc']);
    $cat_id = $db_handle->checkValue($_POST['cat_id']);

    $insert_item = $db_handle->insertQuery("INSERT INTO `items`(`user_id`, `item_name`, `item_price`, `short_desc`, `inserted_at`,`cat_id`) VALUES ('{$_SESSION['admin']}','$item_name','$item_price','$short_desc','$inserted_at','$cat_id')");
    if($insert_item){
        $_SESSION['alert'] = 'success';
        echo "<script>window.location.href = 'Item';</script>";
    } else {
        $_SESSION['alert'] = 'danger';
        echo "<script>window.location.href = 'Item';</script>";
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