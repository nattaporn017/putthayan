<?php
require_once "../connect_DB.php";

function getAll($conn) {
    try {
        $sql = $conn->prepare("SELECT * FROM course");
        $sql->execute();
        $resultAll = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultAll;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getID($conn,$course_id) {
    try {
        $sql = $conn->prepare("SELECT * FROM course WHERE course_id = '$course_id'");
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getShowID($conn) {
    try {
        $sql = $conn->prepare("SELECT * FROM course WHERE course_status = 1;");
        $sql->execute();
        $resultShowID = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultShowID;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getShowName($conn) {
    try {
        $sql = $conn->prepare("SELECT DISTINCT course_name FROM course WHERE course_status = 1;");
        $sql->execute();
        $resultShowName = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultShowName;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getShowInstitution($conn) {
    try {
        $sql = $conn->prepare("SELECT DISTINCT course_institution FROM course WHERE course_status = 1;");
        $sql->execute();
        $resultShowName = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultShowName;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>
