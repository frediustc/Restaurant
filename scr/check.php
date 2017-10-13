<?php

    $s = trim(htmlspecialchars($_POST['s']));
    if(!empty($s)){
        header('location: ../search.php?id=' . $s);
    }
    else {
        header('location: ../Admin.orders.php');
    }
 ?>
