<?php
session_start();
echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../connect_DB.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $position = '';

    $sql = $conn->prepare("SELECT * FROM volunteer WHERE email = :username AND national_id = :password");
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        if ($user['position'] == "อาสากู้ภัย") {
            $position = 'v';
        } else {
            $position = 'h';
        }
    }
    if (!empty($position)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['position'] = $position;
        if ($position == 'v') {
            // echo '<script>
            //     setTimeout(function() {
            //         swal({
            //             title: "เข้าสู่ระบบอาสากู้ภัยสำเร็จ",
            //             type: "success",
            //             showConfirmButton: false,
            //             timer: 1000
            //             });
            //     });
            // </script>';
            header("Location: menuV.php");
        } elseif ($position == 'h') {

            header("Location: menuH.php");
        }
    } else {
        echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง",
                        type: "error",
                        showConfirmButton: false,
                        timer: 1000
                        });
                });
            </script>';
    }
}
?>
<?php 
    include '../functionsHdb/InstitutionRdb.php';
    $result = getOne($conn);
    $imageData = base64_encode($result['institution_logo']);
    $imageSrc = "data:image/jpeg/png;base64,{$imageData}";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>เข้าสู่ระบบ</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body >
    <div class="row justify-content-center ">
        <div class="row"><br></div>
        <div class="col-4">
            <div align="center"><img src="<?= $imageSrc ?>" alt="logo" height="250px">
                <form method="post">
                    <div class="input-group">
                        <span for="username" class="input-group-text" id="addon-wrapping">ชื่อผู้ใช้ : </span>
                        <input type="text" class="form-control" placeholder="username" name="username" require>
                    </div>
                    <br>
                    <div class="input-group">
                        <span for="password" class="input-group-text" id="addon-wrapping">รหัสผ่าน : </span>
                        <input type="password" class="form-control" placeholder="password" name="password" maxlength="13" require>
                    </div>
                    <br>
                    <div class="space box" align="center">
                        <button type="submit" name="login" class="btn btn-primary" style="padding: 10px 20px 10px 20px">เข้าสู่ระบบ</button>
                    </div>
                    <hr>
                    <p><a href='../basic/apply.php'>ยังไม่มีบัญชีผู้ใช้งาน</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
