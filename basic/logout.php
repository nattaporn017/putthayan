<?php 
    session_start();
    session_unset();// ลบ session ทั้งหมด
    session_destroy();// ทำลาย session
    header("Location: login.php");
?>