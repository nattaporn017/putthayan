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
            $_POST['address'],
            $_POST['lawsuit'],
            $_POST['cause'],
            $_POST['position'],
            $_POST['status'],
            $_FILES['image'],
        )
    ) {
        $national_id = $_POST['national_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $nationality = $_POST['nationality'];
        $extraction = $_POST['extraction'];
        $religion = $_POST['religion'];
        $health = $_POST['health'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        $lawsuit = $_POST['lawsuit'];
        $cause = $_POST['cause'];
        $position = $_POST['position'];
        $status = $_POST['status'];
        $image = $_FILES['image'];
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

        $dataInput = $conn->prepare("SELECT COUNT(*) as count FROM volunteer WHERE national_id = :national_id ");
        $dataInput->execute(array(':national_id' => $national_id,));
        if ($dataInput->fetchColumn() > 0) {
            $duplicate_dataInput = $conn->prepare("SELECT * FROM volunteer WHERE national_id = :national_id ");
            $duplicate_dataInput->execute(array(':national_id' => $national_id));
            $duplicateData = $duplicate_dataInput->fetch(PDO::FETCH_ASSOC);
            echo '
            <script>
            Swal.fire({
                title: "รหัสประจำตัวประชาชนนี้<br>เคยลงทะบียนสมัครอาสากู้ภัยแล้ว",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            });
            </script>';
            exit();
        }

        $dataInput = $conn->prepare("SELECT COUNT(*) as count FROM volunteer WHERE email = :email ");
        $dataInput->execute(array(':email' => $email,));
        if ($dataInput->fetchColumn() > 0) {
            $duplicate_dataInput = $conn->prepare("SELECT * FROM volunteer WHERE email = :email ");
            $duplicate_dataInput->execute(array(':email' => $email));
            $duplicateData = $duplicate_dataInput->fetch(PDO::FETCH_ASSOC);
            echo '
            <script>
            Swal.fire({
                title: "Email เคยลงทะบียนสมัครอาสากู้ภัยแล้ว",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            });
            </script>';
            exit();
        }


        $allowedTypes = array("image/jpeg, image/jpg");
        $imageType = $_FILES["image"]["type"];
        // ตรวจสอบประเภทของไฟล์รูป
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $fileName = $national_id . '.' . $ext;
        $targetFilePath = '../imagesUpload/' . $fileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

        $insertdata = $conn->prepare("INSERT INTO volunteer (national_id, name,surname,gender, birthday, nationality,
                                        extraction, religion, health, email, telephone, address,lawsuit,cause, position,status, image)
                                        VALUES (:national_id, :name,:surname,:gender, :birthday, :nationality, :extraction,:religion, 
                                        :health, :email, :telephone, :address, :lawsuit, :cause, :position, :status, :image)");
        $insertdata->bindParam(':national_id', $national_id, PDO::PARAM_STR);
        $insertdata->bindParam(':name', $name, PDO::PARAM_STR);
        $insertdata->bindParam(':surname', $surname, PDO::PARAM_STR);
        $insertdata->bindParam(':gender', $gender, PDO::PARAM_STR);
        $insertdata->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $insertdata->bindParam(':nationality', $nationality, PDO::PARAM_STR);
        $insertdata->bindParam(':extraction', $extraction, PDO::PARAM_STR);
        $insertdata->bindParam(':religion', $religion, PDO::PARAM_STR);
        $insertdata->bindParam(':health', $health, PDO::PARAM_STR);
        $insertdata->bindParam(':email', $email, PDO::PARAM_STR);
        $insertdata->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $insertdata->bindParam(':address', $address, PDO::PARAM_STR);
        $insertdata->bindParam(':lawsuit', $lawsuit, PDO::PARAM_STR);
        $insertdata->bindParam(':cause', $cause, PDO::PARAM_STR);
        $insertdata->bindParam(':position', $position, PDO::PARAM_STR);
        $insertdata->bindParam(':status', $status, PDO::PARAM_STR);
        $insertdata->bindParam(':image', $imageData, PDO::PARAM_LOB);
        if ($insertdata->execute()) {
            echo '
            <script>
                Swal.fire({
                    title: "สมัครอาสากู้ภัยสำเร็จ",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = "../basic/login.php";
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
                    window.location.href = "../basic/apply.php";
                });
            </script>';
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>