<?php
if (isset($_POST['order'])) {
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $id = 2;
    $ok = true;

    if($ok){
        $or = $db->prepare('INSERT INTO orders(pid, uid, qty, made) VALUES(?,?,?,NOW())');
        if($or->execute(array($pid, $id, $qty))){
            $id = $db->lastInsertId();
            $now = date("Y-m-d");
            // $it = $db->prepare('SELECT ')
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
                                  <p>Receipt no: <?php echo $id ?></p>
                                  <p>Date: <?php echo $now ?></p>
                                  <p>Client: Fredius Tout Court</p>
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
                                      <td>x <?php echo $qty ?></td>
                                      <td>Otto</td>
                                      <td>@mdo</td>
                                      <td>@mdo</td>
                                    </tr>
                                    <tr>
                                      <td> </td>
                                      <td> </td>
                                      <td> </td>
                                      <td>@mdo</td>
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
