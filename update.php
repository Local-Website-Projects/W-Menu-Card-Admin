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
    $update_info = $db_handle->insertQuery("UPDATE `users` SET `admin_name`='$full_name',`restaurant_name`='$restaurant_name',`contact_number`='$contact_number',`whatsapp`='$whatsapp',`status`='$status',`updated_at`='$updated_at' WHERE user_id = {$_SESSION['admin']}");
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