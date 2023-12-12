<?php
require_once "../connect_DB.php";
include "../functionsH/courseR.php";

echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if (isset($_GET['course_id'])  ) {
    $course_id = $_GET['course_id'];

    try {
        $sql = "UPDATE course SET course_status = 0 WHERE course_id = :course_id";
        $updateOn = $conn->prepare($sql);
        $updateOn->bindParam(':course_id', $course_id, PDO::PARAM_STR);

        $result = $updateOn->execute();
         echo '
            <script>
                Swal.fire({
                    title: "ปิดสถานะเรียบร้อย",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = "../functionsH/courseR.php";
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
                    window.location.href = "../functionsH/courseR.php";
                });
            </script>';
            exit();
}
?>