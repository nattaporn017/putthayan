<?php
require_once "../connect_DB.php";
include "../functionsH/volunteerR.php";

echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if (isset($_GET['national_id'])  ) {
    $national_id = $_GET['national_id'];

    try {
        $sql = "UPDATE volunteer SET status = 0 WHERE national_id = :national_id";
        $updateOn = $conn->prepare($sql);
        $updateOn->bindParam(':national_id', $national_id, PDO::PARAM_STR);

        $result = $updateOn->execute();
         echo '
            <script>
                Swal.fire({
                    title: "ปิดสถานะเรียบร้อย",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = "../functionsH/volunteerR.php";
                });
            </script>';
            exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo '
            <script>
                Swal.fire({
                    title: "เกิดข้อผิดพลาด",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = "../functionsH/volunteerR.php";
                });
            </script>';
            exit();
}
?>