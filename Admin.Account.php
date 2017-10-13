<?php
$page = 'Account';
include 'incl/head.php';
include 'scr/update.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="img/banner.jpg" alt="banner"/>
                    </div>
                    <div class="content">
                        <div class="author">
                          <img class="avatar" src="img/logo.png" alt="logo"/>
                          <h4 class="title"><?php echo $u['fn'] ?><br />
                             <a href="#"><small><?php echo $u['em'] ?></small></a>
                          </h4>
                        </div>
                        <p class="description text-center"><?php echo $u['nb'] ?></p>
                    </div>
                    <hr>
                    <?php if ($u['ut'] == 'Customer'): ?>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $c = 0;
                                    $s = 0;
                                    $pdct = $db->prepare('
                                    SELECT  orders.id, orders.qty, products.price
                                    FROM orders
                                    INNER JOIN users ON users.id = orders.uid
                                    INNER JOIN products ON products.id = orders.pid
                                    WHERE orders.uid = ?
                                    ORDER BY orders.id DESC
                                    ');
                                    $pdct->execute(array($_SESSION['id']));
                                    while ($o = $pdct->fetch()) {
                                        $c++;
                                        $s += (double)$o['qty'] * (double)$o['price'];
                                    }
                                     ?>
                                    <h5><?php echo $c ?><br /><small>Orders</small></h5>
                                </div>
                                <div class="col-md-6">
                                    <h5><?php $english_format_number = number_format($s, 2, '.', ','); echo $english_format_number; ?>&#8373;<br /><small>Spent</small></h5>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                        <p class="category">Fields with (*) are required</p>
                    </div>
                    <div class="content">
                        <form method="post" action="Admin.Account.php">
                            <div class="form-group">
                                <label>Fullname*</label><br>
                                <input type="text" class="form-control border-input" required name="fn" value="<?php echo $u['fn'] ?>" >
                            </div>
                            <div class="form-group">
                                <label>Email*</label><br>
                                <input type="email" class="form-control border-input" required name="em" value="<?php echo $u['em'] ?>" >
                            </div>
                            <div class="form-group">
                                <label>Number*</label><br>
                                <input type="text" class="form-control border-input" required name="nb" value="<?php echo $u['nb'] ?>" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label><br>
                                <input type="password" class="form-control border-input" name="ps">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Retype Password</label><br>
                                <input type="password" class="form-control border-input" name="cn">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" name="update">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php include 'incl/foot.php'; ?>
