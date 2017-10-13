<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <!-- <a href="http://www.creative-tim.com" class="simple-text"> -->
            <a href="./" class="simple-text">
                Ramsys Cafe
            </a>
        </div>

        <ul class="nav">

            <?php if (isset($_SESSION['id'])): ?>
            <li <?php echo $_page == 'Account' ? 'class="active"' : ''; ?>>
                <a href="Admin.Account.php">
                    <i class="ti-user"></i>
                    <p>Account</p>
                </a>
            </li>
            <?php if ($u['ut'] == 'Administrator'): ?>
            <li <?php echo $_page == 'Customers' ? 'class="active"' : ''; ?>>
                <a href="Admin.Customers.php">
                    <i class="ti-world"></i>
                    <p>Customers</p>
                </a>
            </li>
            <li <?php echo $_page == 'Dashboard' ? 'class="active"' : ''; ?>>
                <a href="Admin.Dash.php">
                    <i class="ti-stats-up"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            <li <?php echo $_page == 'Menu' ? 'class="active"' : ''; ?>>
                <a href="Shop.Menu.php">
                    <i class="ti-map"></i>
                    <p>Menu</p>
                </a>
            </li>
            <?php if (isset($_SESSION['id'])): ?>
            <li <?php echo $_page == 'Orders' ? 'class="active"' : ''; ?>>
                <a href="Admin.Orders.php">
                    <i class="ti-clipboard"></i>
                    <p>Orders</p>
                </a>
            </li>
            <?php if ($u['ut'] == 'Administrator'): ?>
            <li <?php echo $_page == 'Products' ? 'class="active"' : ''; ?>>
                <a href="Admin.products.php">
                    <i class="ti-view-list-alt"></i>
                    <p>Products</p>
                </a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            <!-- <li>
                <a href="typography.html">
                    <i class="ti-text"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i class="ti-pencil-alt2"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="maps.html">
                    <i class="ti-map"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="ti-bell"></i>
                    <p>Notifications</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>
<div class="main-panel">
