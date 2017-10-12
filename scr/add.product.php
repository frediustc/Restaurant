<?php
if (isset($_POST['addpdct'])) {
    $n = $_POST['name'];
    $d = $_POST['desc'];
    $p = $_POST['price'];
    $ok = true;
    ?>

     <script type="text/javascript">

     <?php
     //check with notify
     if(!preg_match('/^[a-zA-Z0-9 ]{5,32}$/', $n)) {
         $ok = false;
         ?>

         $.notify({
        	title: '<strong>Name!</strong>',
        	message: '5 - 32 letters, numbers & spaces only.'
        },{
        	type: 'danger'
        });

        <?php } ?>

        <?php
        //check with notify
        if(strlen($d) < 5 || strlen($d) > 100) {
            $ok = false;
            ?>

            $.notify({
           	title: '<strong>Description!</strong>',
           	message: '5 - 100 characters.'
           },{
           	type: 'danger'
           });

           <?php } ?>

        <?php
        //file check
        $target_dir = "img/pdct/";
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        $msg = "File is an image - " . $check["mime"] . ".";

        //check with notify
        if($check == false) {
            $ok = false;
            ?>

            $.notify({
           	title: '<strong>File!</strong>',
           	message: '<?php echo $msg ?>'
           },{
           	type: 'danger'
           });

           <?php } ?>

           <?php
           //check with notify
           if(!preg_match('/^[0-9]+((\.)?[0-9]+)?$/', $p)) {
               $ok = false;
               ?>

               $.notify({
              	title: '<strong>Price!</strong>',
              	message: 'Wrong format.'
              },{
              	type: 'danger'
              });

              <?php } ?>

           <?php
           //check with notify
           if($_FILES["pic"]["size"] > 2200000) {
               $ok = false;
               ?>

               $.notify({
              	title: '<strong>File!</strong>',
              	message: 'Sorry, your file is too large. > 2Mb'
              },{
              	type: 'danger'
              });

              <?php } ?>

           <?php
           //check with notify
           if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg") {
               $ok = false;
               ?>

               $.notify({
              	title: '<strong>File!</strong>',
              	message: 'Sorry, only JPG, JPEG & PNG files are allowed.'
              },{
              	type: 'danger'
              });

              <?php } ?>

              <?php
              //check with notify
              if($ok) {
                  $ins = $db->prepare('INSERT INTO products (name, description, price, creation, day, period, qty)
                  VALUES(?,?,?,NOW(),?,?,?)');
                  if($ins->execute(array($n,$d,$p,$_POST['day'],$_POST['period'],$_POST['qty']))){
                      $last = $db->lastInsertId();
                      $n = 'pdct_' . $last . '.jpg';
                      if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir . $n)) {
                          ?>

                          $.notify({
                            title: '<strong>Success!</strong>',
                            message: 'Product Added.'
                          },{
                            type: 'success'
                          });

                          <?php
                      } else {
                          ?>

                          $.notify({
                         	title: '<strong>Error!</strong>',
                         	message: 'Something went wrong.'
                         },{
                             type: 'danger'
                         }); <?php
                      }
                 }
             } ?>

     </script>

 <?php } ?>


<?php if (isset($_POST['editPdct'])) {
    $n = $_POST['name'];
    $d = $_POST['desc'];
    $p = $_POST['price'];
    $ok = true;
    echo 'ici';
    ?>

     <script type="text/javascript">

     <?php
     //check with notify
     if(!preg_match('/^[a-zA-Z0-9 ]{5,32}$/', $n)) {
         $ok = false;
         ?>

         $.notify({
        	title: '<strong>Name!</strong>',
        	message: '5 - 32 letters, numbers & spaces only.'
        },{
        	type: 'danger'
        });

        <?php } ?>

        <?php
        //check with notify
        if(strlen($d) < 5 || strlen($d) > 100) {
            $ok = false;
            ?>

            $.notify({
           	title: '<strong>Description!</strong>',
           	message: '5 - 100 characters.'
           },{
           	type: 'danger'
           });

           <?php } ?>

              <?php
              //check with notify
              if($ok) {
                  $ins = $db->prepare('UPDATE products SET name = ?, description = ?, price = ?, day = ?, period = ?, qty = ? WHERE id = ?');
                  if($ins->execute(array($n,$d,$p,$_POST['day'],$_POST['period'],$_POST['qty'], $_GET['id']))){

                      if(!empty($_FILES['pic']['name'])){

                          //file check
                          $target_dir = "img/pdct/";
                          $target_file = $target_dir . basename($_FILES["pic"]["name"]);
                          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                          // Check if image file is a actual image or fake image

                          $check = getimagesize($_FILES["pic"]["tmp_name"]);
                          $msg = "File is an image - " . $check["mime"] . ".";

                          //check with notify
                          if($check == false) {
                              $ok = false;
                              ?>

                              $.notify({
                             	title: '<strong>File!</strong>',
                             	message: '<?php echo $msg ?>'
                             },{
                             	type: 'danger'
                             });

                             <?php } ?>

                             <?php
                             //check with notify
                             if($_FILES["pic"]["size"] > 2200000) {
                                 $ok = false;
                                 ?>

                                 $.notify({
                                	title: '<strong>File!</strong>',
                                	message: 'Sorry, your file is too large. > 2Mb'
                                },{
                                	type: 'danger'
                                });

                                <?php } ?>

                             <?php
                             //check with notify
                             if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg") {
                                 $ok = false;
                                 ?>

                                 $.notify({
                                	title: '<strong>File!</strong>',
                                	message: 'Sorry, only JPG, JPEG & PNG files are allowed.'
                                },{
                                	type: 'danger'
                                });

                                <?php }

                                $last = $_GET['id'];
                                $n = 'pdct_' . $last . '.jpg';
                                if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir . $n)) {
                                    ?>

                                    $.notify({
                                      title: '<strong>Success!</strong>',
                                      message: 'Product updated with picture.'
                                    },{
                                      type: 'success'
                                    });

                                    <?php
                                } else {
                                    ?>

                                    $.notify({
                                   	title: '<strong>Error!</strong>',
                                   	message: 'Something went wrong.'
                                   },{
                                       type: 'danger'
                                   }); <?php
                                }
                      }
                      else {
                          ?>

                          $.notify({
                            title: '<strong>Success!</strong>',
                            message: 'Product updated.'
                          },{
                            type: 'success'
                          });

                           <?php
                      }

                 }
             } ?>

     </script>

 <?php } ?>
