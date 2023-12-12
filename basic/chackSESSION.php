<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} //ตรวจสอบว่า session ใน PHP ได้ถูกเปิดหรือไม่ 

echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

function chackForH($conn)
{
    try {
        if (!isset($_SESSION['password'])) {
            echo '<script>
        Swal.fire({
            title: "กรุณาเข้าสู่ระบบ",
            icon: "error",
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location.href = "../basic/login.php";
        });
    </script>';
            exit;
        } else if (($_SESSION['position'] !== 'h')) {
            echo '<script>
        Swal.fire({
            title: "คุณไม่มีสิทธิ์เข้าใช้งานหน้านี้",
            icon: "error",
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location.href = "../basic/login.php";
        });
    </script>';
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function chackForV($conn)
{
    try {
        if (!isset($_SESSION['password'])) {
            echo '<script>
            Swal.fire({
                title: "กรุณาเข้าสู่ระบบ",
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            }).then(function () {
                window.location.href = "../basic/login.php";
            });
        </script>';
            exit;
        } else if (($_SESSION['position'] !== 'v')) {
            echo '<script>
            Swal.fire({
                title: "คุณไม่มีสิทธิ์เข้าใช้งานหน้านี้",
                icon: "error",
                showConfirmButton: false,
                timer: 2000
            }).then(function () {
                window.location.href = "../basic/login.php";
            });
        </script>';
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>