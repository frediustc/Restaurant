<?php
$page = 'Orders';
include 'incl/head.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if ($u['ut'] == 'Administrator'): ?>
                    <div class="orderTop">
                        <form class="search" action="scr/check.php" method="post">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="text" class="form-control" placeholder="Searh an Order using the ID" required name="s">
                                  <span class="input-group-addon" id="basic-addon1"><span class="ti-search"></span></span>
                                </div>
                            </div>
                        </form>
                        <a href="Admin.Products.Add.php" class="btn btn-primary link"><span class="ti-plus"></span>Add Product</a>

                    </div>

                <?php endif; ?>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Orders List</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php if ($u['ut'] == 'Administrator'): ?>
                        <table class="table">
                            <thead>
                                <th>ID.</th>
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
                                $q = '%' . $_GET['id'] . '%';
                                $pdct = $db->prepare('
                                SELECT orders.pid, orders.id, users.fn, orders.made, users.nb, products.name, orders.qty, products.price, orders.status
                                FROM orders
                                INNER JOIN users ON users.id = orders.uid
                                INNER JOIN products ON products.id = orders.pid
                                WHERE orders.id LIKE ?
                                ORDER BY status

                                ');
                                $pdct->execute(array($q));
                                while ($p = $pdct->fetch()) { ?>
                                <tr>
                                    <td scope="row"><?php echo $p['id'] ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'incl/foot.php'; ?>
