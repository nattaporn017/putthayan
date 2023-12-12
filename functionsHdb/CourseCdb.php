<?php
require_once "../connect_DB.php";
echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

// print_r('');
// return;
try {
    if (
        isset(
            $_POST['course_id'],
            $_POST['course_name'],
            $_POST['course_institution'],
            $_POST['course_detail'],
            $_POST['course_status'],
        )
    ) {
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];
        $course_institution = $_POST['course_institution'];
        $course_detail = $_POST['course_detail'];
        $course_status = $_POST['course_status'];

        $dataInput = $conn->prepare("SELECT COUNT(*) as count FROM course WHERE course_id = :course_id ");
        $dataInput->execute(array(':course_id' => $course_id,));
        if ($dataInput->fetchColumn() > 0) {
            $duplicate_dataInput = $conn->prepare("SELECT * FROM course WHERE course_id = :course_id ");
            $duplicate_dataInput->execute(array(':course_id' => $course_id));
            $duplicateData = $duplicate_dataInput->fetch(PDO::FETCH_ASSOC);
            echo '
            <script>
            Swal.fire({
                title: "รหัสหลักสูตรซ้ำ",
                icon: "error",
                showConfirmButton: false,
                timer: 2000
            });
            </script>';
            exit();
        }

        $insertdata = $conn->prepare("INSERT INTO course (course_id, course_name, course_institution,course_detail,course_status)
                                        VALUES (:course_id,:course_name, :course_institution,:course_detail,:course_status)");
        $insertdata->bindParam(':course_id', $course_id, PDO::PARAM_STR);
        $insertdata->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $insertdata->bindParam(':course_institution', $course_institution, PDO::PARAM_STR);
        $insertdata->bindParam(':course_detail', $course_detail, PDO::PARAM_STR);
        $insertdata->bindParam(':course_status', $course_status, PDO::PARAM_STR);
        if ($insertdata->execute()) {
            echo '
            <script>
                Swal.fire({
                    title: "เพิ่มหลักสูตรสำเร็จ",
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
                    window.location.href = "../functionsH/courseC.php";
                });
            </script>';
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
