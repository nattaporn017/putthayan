<?php
require_once "../connect_DB.php";

function getAll($conn) {
    try {
        $sql = $conn->prepare("SELECT * FROM volunteer");
        $sql->execute();
        $resultAll = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultAll;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getID($conn,$national_id) {
    try {
        $sql = $conn->prepare("SELECT * FROM volunteer WHERE national_id = $national_id");
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
// function getShowUser($conn,$user) {
//     try {
//         $sql = $conn->prepare("SELECT * FROM volunteer WHERE email = $user");
//         $sql->execute();
//         $resultUser = $sql->fetch(PDO::FETCH_ASSOC);
//         return $resultUser;
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//         return false;
//     }
// }
// function getUser($conn,$user) {
//     try {
//         $sql = $conn->prepare("SELECT * FROM volunteer WHERE email = $user");
//         $sql->execute();
//         $resultUser = $sql->fetch(PDO::FETCH_ASSOC);
//         return $resultUser;
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//         return false;
//     }
// }
?>
