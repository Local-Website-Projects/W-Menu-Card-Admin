<div class="header-area">
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
            <div class="col-md-2 no-padding-left-right">
                <div class="logo">
                    <a href="index-2.html">Food Menu</a>
                </div>
            </div>
            <div class="col-md-4 search-area">
                <!--  <div class="header-search"> -->

            </div>
            <div class="col-md-6 text-right">
                <div class="header-right">
                    <ul class="nav d-inl-bl">
                        <!-- Messages: style can be found in dropdown.less-->
                        <?php
                        $fetch_admin = $db_handle->runQuery("select * from users where user_id = {$_SESSION['admin']}");
                        $admin_name = $fetch_admin[0]['admin_name'];
                        ?>
                        <li class="dropdown header-left-flag cta3">
                            <a href="#" data-toggle="dropdown">
                                <img src="assets/img/user-img.png" alt="">
                                <span class="user-id"></span>
                                <span class="arrow-down"></span>
                            </a>
                            <ul class="dropdown-menu cta4 animated flipInX">
                                <li class="flag1"></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Single icon -->
                                            <a href="#">
                                                <div class="single-flag">
                                                    <span class="user-hv cta1" style="background: url(assets/img/user.png);"></span>
                                                    <div class="header-right-icon-text">
                                                        <p>Account</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--  End Single icon -->
                                        <li>
                                            <!-- Single icon -->
                                            <a href="#">
                                                <div class="single-flag">
                                                    <span class="user-hv cta1" style="background: url(assets/img/mail.png);"></span>
                                                    <div class="header-right-icon-text">
                                                        <p>Inbox</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--  End Single icon -->
                                        <li>
                                            <!-- Single icon -->
                                            <a href="#">
                                                <div class="single-flag">
                                                    <span class="user-hv cta1" style="background: url(assets/img/Setting.png);"></span>
                                                    <div class="header-right-icon-text">
                                                        <p>Settings</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--  End Single icon -->
                                        <li>
                                            <!-- Single icon -->
                                            <a href="#">
                                                <div class="single-flag cta5">
                                                    <span class="user-hv" style="background: url(assets/img/power.png);"></span>
                                                    <div class="header-right-icon-text">
                                                        <p>Logout</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--  End Single icon -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>