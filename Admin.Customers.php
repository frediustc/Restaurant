<?php
$page = 'Customers';
include 'incl/head.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Customer List</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Since</th>
                            </thead>
                            <tbody>
                                <?php
                                $cs = $db->prepare('SELECT * FROM users WHERE ut = "Customer"');
                                $cs->execute();
                                while ($c = $cs->fetch()) { ?>
                                    <tr>
                                        <td><?php echo $c['id'] ?></td>
                                        <td><?php echo $c['fn'] ?></td>
                                        <td><?php echo $c['em'] ?></td>
                                        <td><?php echo $c['nb'] ?></td>
                                        <td><?php echo $c['reg'] ?></td>
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
