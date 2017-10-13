<?php
session_start();
include 'incl/db.php';
$_page = isset($page) ? $page : 'Restaurant';
if(!isset($_SESSION['id']) && $_page != 'Menu'){
    header('location: Shop.Menu.php');
}
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin | <?php echo $_page ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'> -->
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

</head>
<body>

<div class="wrapper">
    <?php if(!isset($_SESSION['id'])){ include 'incl/log.php'; }
    else {
        $user = $db->prepare('SELECT * FROM users WHERE id = ?');
        $user->execute(array($_SESSION['id']));
        $u = $user->fetch();
    }
    ?>
    <?php include 'incl/aside.php' ?>
    <?php include 'incl/header.php' ?>
