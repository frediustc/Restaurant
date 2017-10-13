<?php
$page = 'Orders';
include 'incl/head.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if ($u['ut'] == 'Administrator'): ?>
                    <p><a href="Admin.Products.Add.php" class="btn btn-primary link"><span class="ti-plus"></span>Add Product</a></p>
                <?php endif; ?>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Orders List</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php if ($u['ut'] == 'Administrator'): ?>
                        <table class="table">
                            <thead>
                                <th>Prev.</th>
                                <th>Name</th>
                                <th>Cust.</th>
                                <th>Phone</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Opt</th>
                            </thead>
                            <tbody>
                                <?php
                                $pdct = $db->prepare('
                                SELECT orders.pid, orders.id, users.fn, orders.made, users.nb, products.name, orders.qty, products.price, orders.status
                                FROM orders
                                INNER JOIN users ON users.id = orders.uid
                                INNER JOIN products ON products.id = orders.pid
                                ORDER BY status 
                                ');
                                $pdct->execute();
                                while ($p = $pdct->fetch()) { ?>
                                <tr>
                                    <td class="img-table"><img src="img/pdct/pdct_<?php echo $p['pid'] ?>.jpg" alt="previous"></td>
                                    <td><?php echo $p['name'] ?></td>
                                    <td><?php echo $p['fn'] ?></td>
                                    <td><?php echo $p['nb'] ?></td>
                                    <td><?php echo $p['price'] ?>&#8373; </td>
                                    <td>x <?php echo $p['qty'] ?></td>
                                    <td><?php echo (double)$p['qty'] * (double)$p['price'] ?>&#8373; </td>
                                    <td><?php echo $p['made'] ?></td>
                                    <td><?php echo $p['status'] ?></td>
                                    <td>
                                        <?php if ($p['status'] == 'queue'): ?>
                                            <a href="Admin.Orders.Validate.php?id=<?php echo $p['id'] ?>" class="btn btn-success btn-table"><span class="ti-check"></span></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php endif; ?>

                        <?php if ($u['ut'] == 'Customer'): ?>
                        <table class="table">
                            <thead>
                                <th>Prev.</th>
                                <th>Name</th>
                                <th>Desc.</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php
                                $pdct = $db->prepare('
                                SELECT orders.pid, orders.id, orders.made, products.name, products.description, orders.qty, products.price, orders.status
                                FROM orders
                                INNER JOIN users ON users.id = orders.uid
                                INNER JOIN products ON products.id = orders.pid
                                WHERE orders.uid = ?
                                ORDER BY orders.id DESC
                                ');
                                $pdct->execute(array($_SESSION['id']));
                                while ($p = $pdct->fetch()) { ?>
                                <tr>
                                    <td class="img-table"><img src="img/pdct/pdct_<?php echo $p['pid'] ?>.jpg" alt="previous"></td>
                                    <td><?php echo $p['name'] ?></td>
                                    <td><?php echo $p['description'] ?></td>
                                    <td><?php echo $p['price'] ?>&#8373; </td>
                                    <td>x <?php echo $p['qty'] ?></td>
                                    <td><?php echo (double)$p['qty'] * (double)$p['price'] ?>&#8373; </td>
                                    <td><?php echo $p['made'] ?></td>
                                    <td><?php echo $p['status'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'incl/foot.php'; ?>
