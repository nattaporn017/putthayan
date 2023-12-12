<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "putthayan_db";
$port = "4306";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
    date_default_timezone_set('Asia/Bangkok');
?>