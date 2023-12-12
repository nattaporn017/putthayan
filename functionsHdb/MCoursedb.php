<?php 
require_once "../connect_DB.php";
echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

try{
    if (
        isset(
            $_POST['m_start'],
            $_POST['m_end'],
            $_POST['m_befor'],
            $_POST['course_id'],
        )
    ) {
        $m_start = $_POST['m_start'];
        $m_end = $_POST['m_end'];
        $m_befor = $_POST['m_befor'];
        $course_id = $_POST['course_id'];

        $insertdata = $conn->prepare("INSERT INTO m_course (m_start, m_end,m_befor,course_id)
                                        VALUES (:m_start, :m_end,:m_befor,:course_id)");
        $insertdata->bindParam(':m_start', $m_start, PDO::PARAM_STR);
        $insertdata->bindParam(':m_end', $m_end, PDO::PARAM_STR);
        $insertdata->bindParam(':m_befor', $m_befor, PDO::PARAM_STR);
        $insertdata->bindParam(':course_id', $course_id, PDO::PARAM_STR);
        if ($insertdata->execute()) {
            echo '
            <script>
                Swal.fire({
                    title: "บันทึกข้อมูลหลักสูตรสำเร็จ",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = "#";
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
                    window.location.href = "#";
                });
            </script>';
        }

    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>