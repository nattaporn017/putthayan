<?php
require_once "../connect_DB.php";

function getAll($conn) {
    try {
        $sql = $conn->prepare("SELECT * FROM institution");
        $sql->execute();
        $resultAll = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultAll;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getOne($conn) {
    try {
        $sql = $conn->prepare("SELECT * FROM institution");
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>