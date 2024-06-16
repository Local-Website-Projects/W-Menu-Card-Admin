<div class="header-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 no-padding-left-right">
                <div class="logo">
                    <a href="Home">Food Menu</a>
                </div>
            </div>
            <div class="col-md-4 search-area">
            </div>
            <div class="col-md-6 text-right">
                <div class="header-right">
                    <ul class="nav d-inl-bl">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown header-left-flag cta1">
                            <a href="#" class="dropdown-toggle cta1" data-toggle="dropdown"></a>
                        </li>
                    </ul>
                    <ul class="nav d-inl-bl">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown header-left-flag cta2">
                            <a href="#" class="dropdown-toggle cta2" data-toggle="dropdown"></a>
                        </li>
                    </ul>
                    <ul class="nav d-inl-bl">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown header-left-flag cta3">
                            <a href="#" data-toggle="dropdown">
                                <?php
                                $fetch_admin = $db_handle->runQuery("select * from users where user_id = {$_SESSION['admin']}");
                                ?>
                                <img src="assets/img/user-img.png" alt="">
                                <span class="user-id"><?php echo $fetch_admin[0]['admin_name'];?></span>
                                <span class="arrow-down"></span>
                            </a>
                            <ul class="dropdown-menu cta4 animated flipInX">
                                <li class="flag1"></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Single icon -->
                                            <a href="Profile">
                                                <div class="single-flag">
                                                    <span class="user-hv cta1" style="background: url(assets/img/user.png);"></span>
                                                    <div class="header-right-icon-text">
                                                        <p>Account</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <!-- Single icon -->
                                            <a href="Settings">
                                                <div class="single-flag">
                                                    <span class="user-hv cta1" style="background: url(assets/img/setting.png);"></span>
                                                    <div class="header-right-icon-text">
                                                        <p>Settings</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!--  End Single icon -->

                                        <li>
                                            <!-- Single icon -->
                                            <a href="Logout">
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