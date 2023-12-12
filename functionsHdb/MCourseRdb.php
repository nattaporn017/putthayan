<?php
require_once "../connect_DB.php";
function getList($conn) {
    try {
        $sql = $conn->prepare("SELECT m_course.*, course.course_name, 
                                        course.course_institution
                                FROM m_course
                                JOIN course ON m_course.course_id = course.course_id
                                ORDER BY m_course.m_id DESC;
                            ");
        //คำสั่งแสดงผลข้อมูลทั้งหมดจากตาราง m_course และ ที่มี course_id เป็น FK จากตาราง course cและดึง course_name กับ course_institution ที่อยู่ในตาราง course มาแสดงด้วย
        // m_course.*: เลือกทุกคอลัมน์จากตาราง m_course.
        // course.course_name, course.course_institution: เลือกคอลัมน์ course_name และ course_institution จากตาราง course.
        // JOIN course ON m_course.course_id = course.course_id: ใช้ JOIN เพื่อรวมข้อมูลจากทั้งสองตาราง โดยผูกกันด้วย course_id.
        // นอกจากนี้, คุณยังสามารถใช้ LEFT JOIN, RIGHT JOIN, หรือ FULL JOIN ตามต้องการขึ้นอยู่กับลักษณะของข้อมูลที่คุณต้องการดึงมา
        $sql->execute();
        $resultList = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultList;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>