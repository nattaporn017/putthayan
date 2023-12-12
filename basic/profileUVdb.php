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
                $_POST['national_id'], 
                $_POST['name'], 
                $_POST['surname'], 
                $_POST['gender'], 
                $_POST['birthday'], 
                $_POST['nationality'], 
                $_POST['extraction'], 
                $_POST['religion'], 
                $_POST['health'], 
                $_POST['email'], 
                $_POST['telephone'], 
                $_POST['address'],)) 
                {
                $national_id = $_POST["national_id"];
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $gender = $_POST["gender"];
                $birthday = $_POST["birthday"];
                $nationality = $_POST["nationality"];
                $extraction = $_POST["extraction"];
                $religion = $_POST["religion"];
                $health = $_POST["health"];
                $email = $_POST["email"];
                $telephone = $_POST["telephone"];
                $address = $_POST["address"];

        // ตรวจสอบว่ามีไฟล์รูปถูกอัปโหลดหรือไม่
        if (!empty($_FILES['image']['name'])) {
            $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

            $filename = $_FILES['image']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $fileName = $national_id . '.' . $ext;
            $targetFilePath = '../imagesUpload/' . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

            $updateSql = $conn->prepare("UPDATE volunteer SET name = :name,surname = :surname, gender = :gender, birthday = :birthday, nationality = :nationality, 
                        extraction = :extraction, religion = :religion, health = :health, email = :email, 
                        telephone = :telephone, address = :address, image =:image
                        WHERE national_id = :national_id");
        // กำหนดค่าพารามิเตอร์
            $updateSql->bindParam(":name", $name);
            $updateSql->bindParam(":surname", $surname);
            $updateSql->bindParam(":gender", $gender);
            $updateSql->bindParam(":birthday", $birthday);
            $updateSql->bindParam(":nationality", $nationality);
            $updateSql->bindParam(":extraction", $extraction);
            $updateSql->bindParam(":religion", $religion);
            $updateSql->bindParam(":health", $health);
            $updateSql->bindParam(":email", $email);
            $updateSql->bindParam(":telephone", $telephone);
            $updateSql->bindParam(":address", $address);
            $updateSql->bindParam(":national_id", $national_id);

            $updateSql->bindParam(':image', $imageData, PDO::PARAM_LOB);

            // ทำการ execute คำสั่ง SQL
            if ($updateSql->execute()) {
                echo '
                <script>
                    Swal.fire({
                        title: "อัพเดตโปรไฟล์ และอัพเดตรูปประจำตัวสำเร็จ",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        window.location.href = "../basic/profileRV.php";
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
                        window.location.href = "../basic/profileRV.php";
                    });
                </script>';
            }
        } else {
            $updateSql = $conn->prepare("UPDATE volunteer SET name = :name,surname = :surname, gender = :gender, birthday = :birthday, nationality = :nationality, 
            extraction = :extraction, religion = :religion, health = :health, email = :email, 
            telephone = :telephone, address = :address
            WHERE national_id = :national_id");
            // กำหนดค่าพารามิเตอร์
            $updateSql->bindParam(":name", $name);
            $updateSql->bindParam(":surname", $surname);
            $updateSql->bindParam(":gender", $gender);
            $updateSql->bindParam(":birthday", $birthday);
            $updateSql->bindParam(":nationality", $nationality);
            $updateSql->bindParam(":extraction", $extraction);
            $updateSql->bindParam(":religion", $religion);
            $updateSql->bindParam(":health", $health);
            $updateSql->bindParam(":email", $email);
            $updateSql->bindParam(":telephone", $telephone);
            $updateSql->bindParam(":address", $address);
            $updateSql->bindParam(":national_id", $national_id);
            // ทำการ execute คำสั่ง SQL
            if ($updateSql->execute()) {
                echo '
                <script>
                    Swal.fire({
                        title: "อัพเดตโปรไฟล์สำเร็จ",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        window.location.href = "../basic/profileRV.php";
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
                        window.location.href = "../basic/profileRV.php";
                    });
                </script>';
            }
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>