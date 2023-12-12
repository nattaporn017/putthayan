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
            $_POST['institution_name'],
            $_POST['institution_number'],
            $_POST['institution_association'],
            $_POST['institution_address'],
            $_POST['institution_telephone'],
        )
    ) {
        $institution_name = $_POST['institution_name'];
        $institution_number = $_POST['institution_number'];
        $institution_association = $_POST['institution_association'];
        $institution_address = $_POST['institution_address'];
        $institution_telephone = $_POST['institution_telephone'];

        if (!empty($_FILES['institution_logo']['name'])) {
            $imageData = file_get_contents($_FILES["institution_logo"]["tmp_name"]);

            $filename = $_FILES['institution_logo']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $random = bin2hex(random_bytes(5)); // hex จาก random bytes 5 ตัว
            $fileName = 'logo' . substr($random, 0, 10) . '.' . $ext; // เลือกเฉพาะ 10 ตัวแรก
            $targetFilePath = '../imageLogo/' . $fileName;
            move_uploaded_file($_FILES['institution_logo']['tmp_name'], $targetFilePath);

            $updateData = $conn->prepare("UPDATE institution 
                                            SET institution_name = :institution_name,
                                            institution_address = :institution_address, 
                                            institution_telephone = :institution_telephone,
                                            institution_logo = :institution_logo
                                            WHERE institution_number = :institution_number");
            $updateData->bindParam(':institution_name', $institution_name, PDO::PARAM_STR);
            $updateData->bindParam(':institution_address', $institution_address, PDO::PARAM_STR);
            $updateData->bindParam(':institution_telephone', $institution_telephone, PDO::PARAM_STR);
            $updateData->bindParam(':institution_logo', $imageData, PDO::PARAM_LOB);
            $updateData->bindParam(':institution_number', $institution_number, PDO::PARAM_STR);
            if ($updateData->execute()) {
                echo '
                    <script>
                        Swal.fire({
                            title: "บันทึกข้อมูล และอัพเดตโลโก้สำเร็จ",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            window.location.href = "../functionsH/institutionR.php";
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
                            window.location.href = "../functionsH/institutionR.php";
                        });
                    </script>';
            }
        } else {
            $updateData = $conn->prepare("UPDATE institution SET institution_name = :institution_name,
                                            institution_address = :institution_address, 
                                            institution_telephone = :institution_telephone
                                            WHERE institution_number = :institution_number");
            $updateData->bindParam(':institution_name', $institution_name, PDO::PARAM_STR);
            $updateData->bindParam(':institution_address', $institution_address, PDO::PARAM_STR);
            $updateData->bindParam(':institution_telephone', $institution_telephone, PDO::PARAM_STR);
            $updateData->bindParam(':institution_number', $institution_number, PDO::PARAM_STR);

            if ($updateData->execute()) {
                echo '
                        <script>
                            Swal.fire({
                                title: "บันทึกข้อมูลสำเร็จ",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function () {
                                window.location.href = "../functionsH/institutionR.php";
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
                                window.location.href = "../functionsH/institutionR.php";
                            });
                        </script>';
            }
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
