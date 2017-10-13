<?php
if (isset($_POST['order'])) {
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $id = $u['id'];
    $ok = true;

    if($ok){
        $or = $db->prepare('INSERT INTO orders(pid, uid, qty, made) VALUES(?,?,?,NOW())');
        if($or->execute(array($pid, $id, $qty))){
            $last = $db->prepare('
                SELECT orders.id, users.fn, orders.made, products.name, orders.qty, products.price
                FROM orders
                INNER JOIN users ON users.id = orders.uid
                INNER JOIN products ON products.id = orders.pid
                WHERE orders.uid = ? ORDER BY orders.id DESC LIMIT 1');
            $last->execute(array($u['id']));
            $data = $last->fetch();
            ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Receipt</h4>
                  </div>
                  <div class="modal-body">
                      <div id="receipt">
                          <div class="text-center">
                              <center>
                                  <img src="img/logo.jpg" alt="logo">
                                   <h3>My Resto</h3>
                                  <p>Receipt no: <?php echo $data['id'] ?></p>
                                  <p>Date: <?php echo $data['made'] ?></p>
                                  <p>Client: <?php echo $data['fn'] ?></p>
                                  <p>Payment type: Cash</p>
                              </center>
                          </div>
                            <center>
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>QTY</th>
                                      <th>ITEM</th>
                                      <th>PRICE</th>
                                      <th>TOTAL</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>x <?php echo $data['qty'] ?></td>
                                      <td><?php echo $data['name'] ?></td>
                                      <td><?php echo $data['price'] ?></td>
                                      <td><?php echo (double)$data['qty'] * (double)$data['price'] ?></td>
                                    </tr>
                                    <tr>
                                      <td> </td>
                                      <td> </td>
                                      <td> </td>
                                      <td><?php echo (double)$data['qty'] * (double)$data['price'] ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </center>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-info btn-fill" onclick="printJS({ printable: 'receipt', type: 'html', maxWidth: 320 });">Print</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <script src="js/print.min.js"></script>
            <script type="text/javascript">
            $('#myModal').modal('show');

                $.notify({
                  title: '<strong>Success!</strong>',
                  message: 'Order made.'
                },{
                  type: 'success'
                });


            </script>

            <?php
        }
        else {
            ?>

            <script type="text/javascript">
                $.notify({
                  title: '<strong>Error!</strong>',
                  message: 'Something went wrong'
                },{
                  type: 'danger'
                });
            </script>

            <?php
        }
    }

}
