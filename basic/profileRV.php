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
    <title>ข้อมูลผู้ใช้งานระบบ</title>
    <!-- Custom fonts for this template-->
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
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

                        <i class="fas fa-chevron-right"></i>&nbsp;โปรไฟล์
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
                                <div class="col-md-6" style="padding: 40px;">

                                    <div class="card " style="color: black;">
                                        <div class="card-body">
                                            <center>
                                                <img src="<?= $imageSrc ?>" alt="image" style="width: 150px; height: 150px; margin: 10px;">
                                            </center>
                                            <hr>
                                            <div class="column50">
                                                <p>ตำแหน่ง : <?php echo $userProfile['position'] ?></p>
                                                <p>สถานะอาสากู้ภัย : <?php
                                                                        if ($userProfile['status'] == 1) {
                                                                            echo 'เปิดใช้งาน';
                                                                        } else {
                                                                            echo 'ปิดใช้งาน';
                                                                        }
                                                                        ?>
                                                </p>
                                                <p>รหัสประจำตัวประชาชน : <?php echo $userProfile['national_id'] ?></p>
                                                <p>ชื่อ - นามสกุล : <?php echo $userProfile['name'] ?>&nbsp;<?php echo $userProfile['surname'] ?></p>

                                                <p>เพศ : <?php echo $userProfile['gender'] ?></p>
                                                <p>วัน/เดือน/ปี เกิด : <?php echo $userProfile['birthday'] ?></p>
                                                <p>สัญชาติ : <?php echo $userProfile['nationality'] ?></p>
                                                <p>เชื้อชาติ : <?php echo $userProfile['extraction'] ?></p>
                                                <p>ศาสนา : <?php echo $userProfile['religion'] ?></p>
                                            </div>
                                            <div class="column50">
                                                <p>สุขภาพ / โรคประจำตัว : <?php echo $userProfile['health'] ?></p>
                                                <p>อีเมล์ : <?php echo $userProfile['email'] ?></p>
                                                <p>เบอร์โทรศัพท์ : <?php echo $userProfile['telephone'] ?></p>
                                                <p>ที่อยู่ : <?php echo $userProfile['address'] ?></p>
                                                <p>ประวัติต้องโทษ คดีแพ่ง / อาญา : <?php echo $userProfile['lawsuit'] ?></p>
                                                <p>สาเหตุ : <?php echo $userProfile['cause'] ?></p>
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
</html>
<?php
include 'chackSESSION.php';
chackForV($conn);
?>