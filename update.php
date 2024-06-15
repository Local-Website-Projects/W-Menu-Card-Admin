<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$updated_at = date("Y-m-d H:i:s");
$today = date("Y-m-d");

if (!isset($_SESSION['admin'])) {
    echo "
    <script>
    window.location.href = 'Login';
    </script>
    ";
}


if (isset($_POST['admin_approve'])) {
    $admin_id = $db_handle->checkValue($_POST['admin_id']);
    $post = $db_handle->checkValue($_POST['post']);
    $role = $db_handle->checkValue($_POST['role']);

    $update_admin = $db_handle->insertQuery("UPDATE `admin` SET `post`='$post',`user_type`='$role',`approve_status`='1',`updated_at`='$updated_at' WHERE `admin_id` = '$admin_id'");
    if ($update_admin) {
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Employee';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Employee';
</script>
        ";
    }
}


if (isset($_POST['edit_category'])) {
    $category_id = $db_handle->checkValue($_POST['category_id']);
    $category_name = $db_handle->checkValue($_POST['category_name']);

    $update_category = $db_handle->insertQuery("UPDATE `category` SET `category_name`='$category_name',`updated_at`='$updated_at' WHERE `category_id` = '$category_id'");
    if ($update_category) {
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Category';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Category';
</script>
        ";
    }
}


if (isset($_POST['edit_product'])) {
    $product_id = $db_handle->checkValue($_POST['product_id']);
    $product_name = $db_handle->checkValue($_POST['product_name']);
    $product_cat = $db_handle->checkValue($_POST['product_cat']);
    $product_variety = $db_handle->checkValue($_POST['product_variety']);
    $company_name = $db_handle->checkValue($_POST['company_name']);

    $update_product = $db_handle->insertQuery("UPDATE `product` SET `product_name`='$product_name',`cat_id`='$product_cat',`variety`='$product_variety',`company_name`='$company_name',`updated_at`='$updated_at' WHERE `product_id` = '$product_id'");
    if ($update_product) {
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href = 'Product';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href = 'Product';
</script>
        ";
    }
}


if (isset($_POST['edit_primary_stock'])) {
    $p_stock_id = $db_handle->checkValue($_POST['p_stock_id']);
    $quantity = $db_handle->checkValue($_POST['quantity']);
    $buying_cost = $db_handle->checkValue($_POST['buying_cost']);
    $selling_cost = $db_handle->checkValue($_POST['selling_cost']);

    $update_primary_stock = $db_handle->insertQuery("UPDATE `primary_stock` SET `quantity`='$quantity',`buying_cost`='$buying_cost',`selling_cost`='$selling_cost',`updated_at`='$updated_at' WHERE `p_stock_id` = '$p_stock_id'");
    if($update_primary_stock){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href = 'Stock';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href = 'Stock';
</script>
        ";
    }
}


if (isset($_POST['update_password'])) {
    $old_password = $db_handle->checkValue($_POST['old_password']);
    $new_password = $db_handle->checkValue($_POST['new_password']);

    $fetch_user = $db_handle->runQuery("SELECT * FROM `admin` WHERE admin_id = {$_SESSION['admin']}");
    if (count($fetch_user) == 1) {
        if (password_verify($old_password, $fetch_user[0]['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password = $db_handle->insertQuery("UPDATE `admin` SET `password`='$hashed_password',`updated_at`='$updated_at' WHERE `admin_id` = {$_SESSION['admin']}");
            echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Profile';
</script>
        ";
        } else {
            echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Profile';
</script>
        ";
        }
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Profile';
</script>
        ";
    }
}


if(isset($_POST['edit_customer'])){
    $customer_id = $db_handle->checkValue($_POST['customer_id']);
    $customer_name = $db_handle->checkValue($_POST['customer_name']);
    $customer_phone = $db_handle->checkValue($_POST['customer_phone']);
    $discount = $db_handle->checkValue($_POST['discount']);
    $update_customer = $db_handle->insertQuery("UPDATE `customer_data` SET `customer_name`='$customer_name',`contact_phone`='$customer_phone',`updated_at`='$updated_at',`discount_percentage`='$discount' WHERE `customer_id` = '$customer_id'");
    if($update_customer){
        echo "
        <script>
        document.cookie = 'alert = 4;';
        window.location.href='Customer';
</script>
        ";
    } else {
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href='Customer';
</script>
        ";
    }
}