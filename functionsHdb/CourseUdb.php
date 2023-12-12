<?php
require_once "../connect_DB.php";
echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

try {
    if (
        isset(
                $_POST['course_id'], 
                $_POST['course_name'], 
                $_POST['course_institution'], 
                $_POST['course_detail'], 
               )) 
                {
                $course_id = $_POST["course_id"];
                $course_name = $_POST["course_name"];
                $course_institution = $_POST["course_institution"];
                $course_detail = $_POST["course_detail"];

            $updateSql = $conn->prepare("UPDATE course SET course_name = :course_name, 
                                        course_institution = :course_institution, 
                                        course_detail = :course_detail
                                        WHERE course_id = :course_id");
            $updateSql->bindParam(":course_name", $course_name);
            $updateSql->bindParam(":course_institution", $course_institution);
            $updateSql->bindParam(":course_detail", $course_detail);
            $updateSql->bindParam(":course_id", $course_id);

            if ($updateSql->execute()) {
                echo '
                <script>
                    Swal.fire({
                        title: "บันทึกข้อมูลหลักสูตรสำเร็จ",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        window.location.href = "../functionsH/courseR.php";
                    });
                </script>';
                exit();
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
            }
        } 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>