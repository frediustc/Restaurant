<?php
$page = 'Products';
include 'incl/head.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p><a href="Admin.Products.Add.php" class="btn btn-primary link"><span class="ti-plus"></span>Add Product</a></p>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Striped Table</h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <th>Prev.</th>
                                <th>Name</th>
                                <th>Desc.</th>
                                <th>Price</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Qty</th>
                                <th>Opt</th>
                            </thead>
                            <tbody>
                                <?php
                                $pdct = $db->prepare('SELECT * FROM products ORDER BY name');
                                $pdct->execute();
                                while ($p = $pdct->fetch()) { ?>
                                <tr>
                                    <td class="img-table"><img src="img/pdct/pdct_<?php echo $p['id'] ?>.jpg" alt="previous"></td>
                                    <td><?php echo $p['name'] ?></td>
                                    <td><?php echo $p['description'] ?></td>
                                    <td><?php echo $p['price'] ?>&#8373; </td>
                                    <td><?php echo $p['day'] ?></td>
                                    <td><?php echo $p['period'] ?></td>
                                    <td><?php echo $p['qty'] ?></td>
                                    <td>
                                        <a href="Admin.Products.Edit.php?id=<?php echo $p['id'] ?>" class="btn btn-primary btn-table"><span class="ti-pencil"></span></a>
                                        <a href="Admin.Products.Delete.php?id=<?php echo $p['id'] ?>" class="btn btn-danger btn-table"><span class="ti-trash"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'incl/foot.php'; ?>
