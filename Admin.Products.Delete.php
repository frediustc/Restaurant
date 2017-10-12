<?php
include 'incl/db.php';
$del = $db->prepare('DELETE FROM products WHERE id = ?');
$del->execute(array($_GET['id']));
header('location: Admin.Products.php');
