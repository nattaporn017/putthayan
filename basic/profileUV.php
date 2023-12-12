<?php
session_start();
require_once "../connect_DB.php";
include "../basic/profileRdb.php";
// print_r($userProfile);
// return;

$imageData = base64_encode($userProfile['image']);
$imageSrc = "data:image/jpeg;base64,{$imageData}";
?>
<script>
    function displayCurrentDate() {
        var currentDate = new Date();
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var formattedDate = currentDate.toLocaleDateString('th-TH', options);
        document.getElementById('currentDate').textContent = formattedDate;
    }
    window.onload = function() {
        displayCurrentDate();
    };
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>อัพเดตโปรไฟล์ผู้ใช้งานระบบ</title>
    <!-- Custom fonts for this template-->
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
    .column10 {
        width: 10%;
        float: left;
    }

    .column5 {
        width: 5%;
        float: left;
    }

    .column20 {
        width: 20%;
        float: left;
    }

    .column50 {
        width: 50%;
        float: left;
    }
</style>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:rgb(153, 0, 0);">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../basic/menuV.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span><i class="fas fa-home"></i> อาสากู้ภัย</span></a>
                <!-- <span>Dashboard</span></a> -->
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                ทั่วไป
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../functionsV/register.php">
                    <i class="fas fa-registered"></i>
                    <span> ลงทะเบียนอบรม</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user-tie"></i>
                    <span> ผลการพิจาณา</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-calendar-alt"></i>
                    <span> ตารางปฏิบัติงาน</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                <p id="currentDate" style="color: white; text-align: center;"></p>
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar)เลื่อนชิดซ้าย -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:rgb(255,235,205);">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div style="color:gray">

                        <i class="fas fa-chevron-right"></i>&nbsp;อัพเดตโปรไฟล์
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['password'])) : ?>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                                <?php endif ?>
                                <h4><i class="fas fa-user-circle"></i></h4>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../basic/profileRV.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    โปรไฟล์
                                </a>
                                <a class="dropdown-item" href="../basic/profileUV.php">
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    อัพเดตโปรไฟล์
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">คุณต้องการที่จะออกจากระบบ ?</h5>
                            </div>
                            <div class="modal-body">โปรดยืนยันการออกจากระบบ</div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">ยกเลิก</button>
                                <a class="btn btn-success" href="./logout.php">ยืนยัน</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Scroll to Top Button เลื่อนขึ้นบนสุด-->
                <a class="scroll-to-top rounded-circle border-0" href="#page-top">
                    <h3><i class="fas fa-angle-up"></i></h3>
                </a>
                <!-- Begin Page Content เนื้อหาเริ่มตรงนี้-->
                <div class="container-fluid">
                    <div class=" align-items-center justify-content-center">
                        <!-- ทดสอบหน้าต่างจอ -->
                        <!-- start -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="padding: 40px;">

                <div class="card" style="color: black;">
                    <div class="card-body">
                        <center>
                            <img src="<?= $imageSrc ?>" alt="image" style="width: 150px; height: 150px; padding:8px;">
                            <h5 class="card-title"><i class="fas fa-user-tie"></i> อัพเดตโปรไฟล์</h5>
                            <hr><br><br>
                        </center>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="col-6 border-right" style="padding: 0px 40px 0px 40px;">
                                    <div class="input-group">
                                        <span style="color:black;" for="position" class="input-group-text" id="addon-wrapping">ตำแหน่ง : </span>
                                        <input type="text" class="form-control" name="position" title="ไม่อนุญาติให้แก้ไข" value="<?php echo  $userProfile['position']; ?>" readonly>
                                    </div><br>
                                    <div class=" input-group">
                                        <span style=" color:black" for="national_id" class="input-group-text">
                                            รหัสประจำตัวประชาชน :
                                        </span>
                                        <input type="text" class="form-control" name="national_id" maxlength="13" pattern="[0-9]+" title="ไม่อนุญาติให้แก้ไข" value="<?php echo  $userProfile['national_id']; ?>" readonly>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="name" class="input-group-text">
                                            ชื่อ :
                                        </span>
                                        <input style=" color:black" type="text" class="form-control" name="name" value="<?php echo  $userProfile['name']; ?> ">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="surname" class="input-group-text">
                                            นามสกุล :
                                        </span>
                                        <input style=" color:black" type="text" class="form-control" name="surname" value="<?php echo  $userProfile['surname']; ?> ">
                                    </div><br>
                                    <div class="input-group">
                                        <span for="gender">เพศ : </span><br>
                                        <div class="column5">
                                        </div>
                                        <div class="column10">
                                            <label><input type="radio" name="gender" value="ชาย" <?php echo ($userProfile['gender'] === 'ชาย') ? 'checked' : ''; ?>>ชาย</label>
                                        </div>
                                        <div class="column10">
                                            <label><input type="radio" name="gender" value="หญิง" <?php echo ($userProfile['gender'] === 'หญิง') ? 'checked' : ''; ?>>หญิง</label>
                                        </div>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="birthday" class="input-group-text">วัน/เดือน/ปี เกิด : </span>
                                        <input style=" color:black" type="date" class="form-control" name="birthday" title="วัน/เดือน/ปี เกิด ต้องไม่ใช่วันนี้หรือวันล่วงหน้า" value="<?php echo  $userProfile['birthday']; ?>">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="nationality" class="input-group-text">
                                            สัญชาติ :
                                        </span>
                                        <input style=" color:black" type="text" class="form-control" name="nationality" value="<?php echo  $userProfile['nationality']; ?>">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="extraction" class="input-group-text">
                                            เชื้อชาติ :
                                        </span>
                                        <input style=" color:black" type="text" class="form-control" name="extraction" value="<?php echo  $userProfile['extraction']; ?>">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="religion" class="input-group-text">
                                            ศาสนา :
                                        </span>
                                        <input style=" color:black" type="text" class="form-control" name="religion" value="<?php echo  $userProfile['religion']; ?>">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="email" class="input-group-text">
                                            อีเมล์ :
                                        </span>
                                        <input style=" color:black" type="email" class="form-control" placeholder="email" name="email" title="กรุณากรอกอีเมล์ให้ถูกต้อง (ต้องมี @gmail.com)" value="<?php echo  $userProfile['email']; ?>">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="color:black" for="telephone" class="input-group-text">
                                            เบอร์โทรศัพท์ :
                                        </span>
                                        <input style=" color:black" type="text" class="form-control" name="telephone" maxlength="10" pattern="[0-9]+" title="เบอร์โทรศัพท์ ต้องประกอบด้วยตัวเลขเท่านั้น!" value="<?php echo  $userProfile['telephone']; ?>">
                                    </div><br>
                                </div>
                                <div class="col-6" style="border-radius:50px;padding: 0px 40px 0px 40px;">
                                    <div class="input-group">
                                        <span for="health">สุขภาพ / โรคประจำตัว : </span>
                                        <input type="text" class="form-control" name="health" style="height: 100px; width: 500px;color:black;" value="<?php echo  $userProfile['health']; ?>">
                                    </div><br>

                                    <div class="input-group">
                                        <span for="address">ที่อยู่ (ตามทะเบียนบ้าน) : </span>
                                        <input type="text" class="form-control" name="address" style="height: 100px; width: 500px;color:black;" value="<?php echo  $userProfile['address']; ?>">
                                    </div><br>
                                    <div class="input-group">
                                        <span for="lawsuit">ประวัติต้องโทษ คดีแพ่ง / อาญา : </span><br>
                                        <div class="column5">
                                        </div>
                                        <div class="column20">
                                            <label><input type="radio" name="lawsuit" value="ไม่เคย" <?php echo ($userProfile['lawsuit'] === 'ไม่เคย') ? 'checked' : ''; ?> disabled>ไม่เคย</label>
                                        </div>
                                        <div class="column10">
                                            <label><input type="radio" name="lawsuit" value="เคย" <?php echo ($userProfile['lawsuit'] === 'เคย') ? 'checked' : ''; ?>disabled>เคย</label>
                                        </div>
                                    </div><br>
                                    <div class="input-group">
                                        <span for="cause">สาเหตุที่ต้องโทษ : ( หากไม่เคยให้ขีด - )</span>
                                        <input type="text" class="form-control" name="cause" style="height: 100px; width: 500px;color:black;" <?php echo  $userProfile['cause']; ?> title="ไม่อนุญาติให้แก้ไข" readonly>
                                    </div><br>
                                    <div class="input-group" style="text-align: center;">
                                        <div class="column50">
                                            <span for="image">อัพเดตรูปประจำตัว : <br></span>
                                        </div>
                                        <div class="column50">
                                            <img width="50%" id="previewImage" alt="" style="padding: 10px;">
                                            <input class="form-control" type="file" id="image" name="image" accept="image/jpeg, image/jpg, image/png">
                                        </div>
                                    </div><br>
                                    <div class="space box" align="right"><button type="button" class="btn btn-danger" style="padding: 10px 20px 10px 20px" onclick="goBack()">ยกเลิก</button>
                                        <!-- <a href='../basic/'><button type="button" class="btn btn-danger" style="padding: 10px 20px 10px 20px">ยกเลิก</button></a> -->
                                        <button type="reset" class="btn btn-secondary" style="padding: 10px 20px 10px 20px">คืนค่า</button>
                                        <button type="button" class="btn btn-success" style="padding: 10px 20px 10px 20px" onclick="confCreate()">บันทึก</button>
                                    </div>
                        </form>

                    </div>
                </div>


            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- style="padding: 40px;" -->
    </div> <!-- row justify-content-center -->
    </div> <!-- container-fluid  -->


<!-- end -->
</div>
                </div>
            </div>

        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="../template/vendor/jquery/jquery.min.js"></script>
        <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../template/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="../template/vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="../template/js/demo/chart-area-demo.js"></script>
        <script src="../template/js/demo/chart-pie-demo.js"></script>
    </div>
    </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confCreate() {
        var national_id = document.querySelector('[name="national_id"]').value;
        var name = document.querySelector('[name="name"]').value;
        var surname = document.querySelector('[name="surname"]').value;
        var gender = document.querySelector('[name="gender"]').value;
        var birthday = document.querySelector('[name="birthday"]').value;
        var nationality = document.querySelector('[name="nationality"]').value;
        var extraction = document.querySelector('[name="extraction"]').value;
        var religion = document.querySelector('[name="religion"]').value;
        var health = document.querySelector('[name="health"]').value;
        var email = document.querySelector('[name="email"]').value;
        var telephone = document.querySelector('[name="telephone"]').value;
        var address = document.querySelector('[name="address"]').value;
        var image = document.querySelector('[name="image"]').value;

        var today = new Date();
        var inputBirthday = new Date(birthday);
        today.setDate(today.getDate() - 1);
        var age = today.getFullYear() - inputBirthday.getFullYear();

        if (name.trim() === '' || gender.trim() === '' ||
            birthday.trim() === '' || nationality.trim() === '' || extraction.trim() === '' ||
            religion.trim() === '' || health.trim() === '' || email.trim() === '' || telephone.trim() === '' ||
            address.trim() === '') {
            Swal.fire({
                title: 'โปรดกรอกข้อมูลให้ครบทุกช่อง',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (age <= 18) {
            Swal.fire({
                title: 'วัน/เดือน/ปี เกิด ไม่ถูกต้อง',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (!email.endsWith('@gmail.com') || /[ก-๙]/.test(email)) {
            // ตรวจสอบรูปแบบของอีเมล
            Swal.fire({
                title: 'Email ต้องประกอบด้วย @gmail.com<br>และไม่ควรมีตัวอักษรภาษาไทย',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        }  else if (!/^\d+$/.test(national_id)) {
            Swal.fire({
                title: 'รหัสประจำตัวประชาชนต้องเป็นตัวเลขเท่านั้น',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (!/^\d+$/.test(telephone)) {
            Swal.fire({
                title: 'หมายเลขโทรศัพท์ต้องเป็นตัวเลขเท่านั้น',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (inputBirthday >= today) {
            Swal.fire({
                title: 'วันเกิดต้องไม่ใช่วันนี้หรือวันล่วงหน้า',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
            return;
        } else {
            Swal.fire({
                text: 'โปรดยืนยันการบันทึกอาสากู้ภัย',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00CC00',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('form').submit();
                }
            });
        }
    }
</script>
<script>
    function previewImage() {
        var input = document.getElementById('image');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById('image').addEventListener('change', previewImage);
</script>
<script>
    function goBack() {
        window.location.href = '../basic/profileRV.php';
    }
</script>

</html>
<?php
 include '../basic/profileUVdb.php';
?>