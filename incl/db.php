<?php
try
{
    $db = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
}
catch(Exception $e)
{
    die ("error: " . $e->getMessage());
}
