<?php
if(!isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Login';
</script>
    ";
}
?>


<!-- bootstrap.min.css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- animate.css -->
<link href="assets/css/animate.min.css" rel="stylesheet">
<!-- material fonts.css -->
<link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet">
<!-- style.css -->
<link href="style.css" rel="stylesheet">
<!-- responsive.css -->
<link href="assets/css/responsive.css" rel="stylesheet">
<!-- theme-color.css -->
<link href="assets/css/theme-color.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->