<?php
include 'incl/db.php';
$del = $db->prepare('UPDATE orders SET status = "take" WHERE id = ?');
$del->execute(array($_GET['id']));
header('location: Admin.Orders.php');
