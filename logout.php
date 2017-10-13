<?php
session_start();
session_destroy();
header('location: Shop.Menu.php');
