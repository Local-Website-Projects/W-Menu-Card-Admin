<div class="navbar_dash_area">
    <div class="responsive-bars">
        <button class="dnl-btn-toggle">
            <span class="nav-bars"><i class="zmdi zmdi-menu"></i></span>
        </button>
    </div>
    <!-- Dashboard Navbar Left -->
    <div class="dash-navbar-left dnl-visible">
        <ul class="dnl-nav">
            <?php
            if($fetch_admin[0]['type'] == 0){
                ?>
                <li class="active-cta">
                    <a href="Home">
                        <span class="dnl-link-icon"></span>
                        <img src="assets/svg/nav-icon1.svg" alt="">
                        <span class="dnl-link-text">Dashboard</span>
                    </a>
                </li>
                <?php
            }
            ?>
            <li>
                <a href="Category">
                    <span class="dnl-link-icon"></span>
                    <img src="assets/svg/nav-icon2.svg" alt="">
                    <span class="dnl-link-text">Category</span>
                </a>
            </li>
            <li>
                <a href="Item">
                    <span class="dnl-link-icon"></span>
                    <img src="assets/svg/nav-icon5.svg" alt="">
                    <span class="dnl-link-text">Items</span>
                </a>
            </li>
        </ul>
    </div>
</div>