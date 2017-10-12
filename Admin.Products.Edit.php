<?php
$page = 'Products';
include 'incl/head.php';

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-push-2">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add New Product</h4>
                    </div>
                    <div class="content">
                        <?php include 'scr/add.Product.php';
                        $sel = $db->prepare('SELECT * FROM products WHERE id = ?');
                        $sel->execute(array($_GET['id']));
                        $s = $sel->fetch();
                        ?>
                        <form method="post" action="Admin.Products.Edit.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control border-input" value="<?php echo $s['name'] ?>" required placeholder="Pizza Mushroom"name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control border-input" value="<?php echo $s['description'] ?>" required placeholder="A set of mushroom on the pizza"name="desc">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control border-input" value="<?php echo $s['price'] ?>" placeholder="75.5" required name="price">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Day</label>
                                        <select class="form-control border-input" name="day" required >
                                            <option value="Mon" <?php echo $s['day'] == 'Mon' ? 'selected' : '' ?> >Monday</option>
                                            <option value="Tue" <?php echo $s['day'] == 'Tue' ? 'selected' : '' ?> >Tuesday</option>
                                            <option value="Wed" <?php echo $s['day'] == 'Wed' ? 'selected' : '' ?> >Wednesday</option>
                                            <option value="Thu" <?php echo $s['day'] == 'Thu' ? 'selected' : '' ?> >Thursday</option>
                                            <option value="Fri" <?php echo $s['day'] == 'Fri' ? 'selected' : '' ?> >Friday</option>
                                            <option value="Sat" <?php echo $s['day'] == 'Sat' ? 'selected' : '' ?> >Saturday</option>
                                            <option value="Sun" <?php echo $s['day'] == 'Sun' ? 'selected' : '' ?> >Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Period</label>
                                        <select class="form-control border-input" name="period" required >
                                            <option value="Morning" <?php echo $s['period'] == 'Morning' ? 'selected' : '' ?> >Morning</option>
                                            <option value="Afternoon" <?php echo $s['period'] == 'Afternoon' ? 'selected' : '' ?> >Afternoon</option>
                                            <option value="Evening" <?php echo $s['period'] == 'Evening' ? 'selected' : '' ?> >Evening</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Previous</label>
                                        <input type="file" class="form-control border-input" name="pic">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>quantity</label>
                                        <input type="number" min="0" class="form-control border-input" value="<?php echo $s['qty'] ?>" required placeholder="12" name="qty">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" name="editPdct">Update</button>
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
