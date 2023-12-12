<?php
require_once "../connect_DB.php";
try {
    if (isset($_SESSION['password'])) {
        $password = $_SESSION['password'];

        $sql = $conn->prepare("SELECT * FROM volunteer WHERE national_id = :password");
        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $userProfile = $sql->fetch(PDO::FETCH_ASSOC);
            return $userProfile;
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
}
?>