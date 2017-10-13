<?php
$page = 'Dashboard';
include 'incl/head.php';

$c = 0;
$s = 0;
$pdct = $db->prepare('
SELECT  orders.id, orders.qty, products.price
FROM orders
INNER JOIN users ON users.id = orders.uid
INNER JOIN products ON products.id = orders.pid
WHERE orders.status = "take"
');
$pdct->execute();
while ($o = $pdct->fetch()) {
    $s += (double)$o['qty'] * (double)$o['price'];
}
$nbr = $db->prepare('SELECT (SELECT COUNT(id) FROM users WHERE ut = "Customer") AS u, (SELECT COUNT(id) FROM orders WHERE status = "queue") AS o, (SELECT COUNT(id) FROM products) AS p');
$nbr->execute();
$n = $nbr->fetch();
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-clipboard"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Orders</p>
                                    <?php echo $n['o'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                Total Orders
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-wallet"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Revenue</p>
                                    &#8373;<?php echo $s ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                Total Revenue
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-user"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Customers</p>
                                    <?php echo $n['u'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                Total Customers
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <i class="ti-view-list-alt"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Product</p>
                                    <?php echo $n['p'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                Total Product
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Sales</h4>
                        <p class="category">All products Sales (Daily bases)</p>
                    </div>
                    <div class="content">
                        <div id="saleChart" class="ct-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'incl/foot.php'; ?>
