<?php
include "../connect_DB.php";

function getShearch($conn, $course_name) {
    try {
        // Use prepared statements to prevent SQL injection
        $sql = $conn->prepare("SELECT 
            course.*,
            m_course.*
        FROM 
            course
        INNER JOIN 
            m_course ON m_course.course_id = course.course_id
        WHERE course_name = :course_name");
        $sql->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $sql->execute();
        
        $resultAll = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultAll;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
