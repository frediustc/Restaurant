<?php
$page = 'Menu';
include 'incl/head.php';
include 'scr/order.php';

function articles($day = 'Mon', $period = 'Morning'){
    require 'incl/db.php';
    ?>
    <section>
        <h3 class="tt"><span><?php echo $period ?></span></h3>
        <div class="row">
            <?php $pdcts = $db->prepare('SELECT * FROM products WHERE day = ? AND period = ?');
            $pdcts->execute(array($day, $period));
            while ($p = $pdcts->fetch()) {
                $orders = $db->prepare('SELECT * FROM orders WHERE pid = ?');
                $orders->execute(array($p['id']));
                $_o = 0;
                while ($o = $orders->fetch()) {
                    $_o += $o['qty'];
                }
                $m = $p['qty'] - $_o;
                if($m > 0){
                ?>
            <div class="col-xs-6">
                <div class="card pdct">
                    <div class="row">
                        <div class="card-img col-xs-5">
                            <img src="img/pdct/pdct_<?php echo $p['id'] ?>.jpg" alt="">
                        </div>
                        <div class="card-body col-xs-7">
                            <span class="card-float" title="available"><?php echo $m ?></span>
                            <p><strong><?php echo $p['name'] ?></strong></p>
                            <p><span class="op-5"><?php echo $p['description'] ?></span></p>
                            <p>Price: <span class="h3 price"><?php echo $p['price'] ?></span>&#8373;</p>
                            <form class="" action="Shop.Menu.php" method="post" class="orderForm">
                                <input type="hidden" name="pid" value="<?php echo $p['id'] ?>">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="total"><?php echo $p['price'] ?></span> &#8373;</span>
                                            <input type="number" name="qty" min="1" value="1" max="<?php echo $m ?>" required class="form-control qty">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <button type="submit" name="order" class="btn btn-primary btn-block">Order Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </section>
    <?php ;
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#Mon" aria-controls="Mon" role="tab" data-toggle="tab">Monday</a></li>
                <li role="presentation"><a href="#Tue" aria-controls="Tue" role="tab" data-toggle="tab">Tuesday</a></li>
                <li role="presentation"><a href="#Wed" aria-controls="Wed" role="tab" data-toggle="tab">Wednesday</a></li>
                <li role="presentation"><a href="#Thu" aria-controls="Thu" role="tab" data-toggle="tab">Thursday</a></li>
                <li role="presentation"><a href="#Fri" aria-controls="Fri" role="tab" data-toggle="tab">Friday</a></li>
                <li role="presentation"><a href="#Sat" aria-controls="Sat" role="tab" data-toggle="tab">Saturday</a></li>
                <li role="presentation"><a href="#Sun" aria-controls="Sun" role="tab" data-toggle="tab">Sunday</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="Mon">
                    <?php
                    articles('Mon', 'Morning');
                    articles('Mon', 'Afternoon');
                    articles('Mon', 'Evening');
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="Tue">
                    <?php
                    articles('Tue', 'Morning');
                    articles('Tue', 'Afternoon');
                    articles('Tue', 'Evening');
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="Wed">
                    <?php
                    articles('Wed', 'Morning');
                    articles('Wed', 'Afternoon');
                    articles('Wed', 'Evening');
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="Thu">
                    <?php
                    articles('Thu', 'Morning');
                    articles('Thu', 'Afternoon');
                    articles('Thu', 'Evening');
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="Fri">
                    <?php
                    articles('Fri', 'Morning');
                    articles('Fri', 'Afternoon');
                    articles('Fri', 'Evening');
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="Sat">
                    <?php
                    articles('Sat', 'Morning');
                    articles('Sat', 'Afternoon');
                    articles('Sat', 'Evening');
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="Sun">
                    <?php
                    articles('Sun', 'Morning');
                    articles('Sun', 'Afternoon');
                    articles('Sun', 'Evening');
                    ?>
                </div>
              </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.qty').change(function(){
        var val = $(this).val();
        var $par = $(this).parents('.card-body');
        var price = $par.children('p').children('.price').text();
        var total = val * price;
        $(this).parent().find('.total').text(total);
    });
</script>

<?php include 'incl/foot.php'; ?>
