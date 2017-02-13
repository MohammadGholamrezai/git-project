<?php
$servername = "localhost";
$database = "cms";
$username = "root";
$password = "";

try {
    $connect = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "ارتباط برقرار شد";
    }
catch(PDOException $e)
    {
    echo "ارتباط ناموفق بود: " . $e->getMessage();
    }
?>
