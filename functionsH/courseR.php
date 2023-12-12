<?php
session_start();
include "../functionsHdb/CourseRdb.php";
$resultAll = getAll($conn);
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
    <title>รายการหลักสูตร</title>
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
<style>
    .column50 {
        width: 50%;
    }

    .name-surname {
        margin-bottom: 10px;
    }
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:rgb(153, 0, 0);">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../basic/menuH.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span><i class="fas fa-home"></i> หัวหน้าหน่วย</span></a>
                <!-- <span>Dashboard</span></a> -->
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                หน้าที่ปฏิบัติ
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../functionsH/institutionR.php">
                    <i class="fas fa-torii-gate"></i>
                    <span> จัดการข้อมูลหน่วยงาน</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../functionsH/volunteerR.php">
                    <i class="fas fa-user-tie"></i>
                    <span> รายชื่ออาสากู้ภัย</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../functionsH/courseR.php">
                    <i class="fas fa-book-medical"></i>
                    <span> จัดการหลักสูตร</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../functionsH/mCourseR.php">
                    <i class="fas fa-clock"></i>
                    <span> จัดการข้อมูลหลักสูตร</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-check-circle"></i>
                    <span> บันทึกการเข้าอบรม</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-star"></i>
                    <span> ความเชี่ยวชาญพิเศษ</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-calendar-alt"></i>
                    <span>การจัดการตารางปฏิบัติงาน</span>
                </a>
                <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#"><i class="fas fa-plus"></i> กิจกรรมการปฏิบัติงาน</a>
                        <a class="collapse-item" href="#"><i class="fas fa-calendar-alt"></i> จัดตารางการปฏิบัติงาน</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-file-alt"></i>
                    <span> รายงานตามเงื่อนไข</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลหน่วยงาน</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลอาสากู้ภัย</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลหลักสูตร</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลจัดการหลักสูตร</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลลงทะเบียน</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลรายการเข้าอบรม</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลผลการพิจารณา</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลความเชี่ยวชาญพิเศษ</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลกิจกรรมการปฏิบัติงาน</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> ข้อมูลตารางการปฏิบัติงาน</a>
                    </div>

                </div>
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
                        <i class="fas fa-chevron-right"></i>&nbsp;จัดการหลักสูตร
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
                                <a class="dropdown-item" href="../basic/profileR.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    โปรไฟล์
                                </a>
                                <a class="dropdown-item" href="../basic/profileU.php">
                                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    อัพเดตโปรไฟล์
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
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
                                <a class="btn btn-success" href="../basic/logout.php">ยืนยัน</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Scroll to Top Button เลื่อนขึ้นบนสุด-->
                <a class="scroll-to-top rounded-circle border-0" href="#page-top">
                    <h3><i class="fas fa-angle-up"></i></h3>
                </a>
                <!-- Begin Page Content เนื้อหาเริ่มตรงนี้-->
                <div class="container-fluid" style="color:black;">
                    <div class=" align-items-center justify-content-center">
                        <!-- start -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="padding: 40px;">

                <div class="card">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title"><i class="fas fa-user-tie"> </i> หลักสูตรเบื้องต้น</h5><br>
                        </center>
                        <div class="gap-2 d-md-flex justify-content-md-end">
                            <div class="d-flex">
                                <div class="input-group">
                                    <a href="../functionsH/courseC.php"> <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i> เพิ่มหลักสูตร</button></a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table ">
                            <thead style="background-color: rgb(178, 225, 254); color:black; text-align: center;">
                                <tr>
                                    <th>ชื่อหลักสูตร</th>
                                    <th>หน่วยงานที่รับผิดชอบ</th>
                                    <th>สถานะหลักสูตร</th>
                                    <th>เพิ่มเติม</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: rgb(240,255,255); color:black;">
                                <?php
                                foreach ($resultAll as $row) {
                                ?>
                                    <tr style="text-align: center;">
                                        <?php if ($row['course_status'] == 1) { ?>
                                            <td style="text-align: left;"><?php echo $row['course_name'] ?></td>
                                            <td style="text-align: left;"><?php echo $row['course_institution'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['course_status'] == 1) {
                                                    echo 'เปิดใช้งาน';
                                                } else {
                                                    echo 'ปิดใช้งาน';
                                                }
                                                ?>
                                            </td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dataModal<?php echo $row['course_id'] ?>"><i class="fab fa-readme"></i></button></td>
                                        <?php } else { ?>
                                            <td style="text-align: left; color:#BEBEBE;"><?php echo $row['course_name'] ?></td>
                                            <td style="text-align: left; color:#BEBEBE;"><?php echo $row['course_institution'] ?></td>
                                            <td style=" color:#BEBEBE;">
                                                <?php
                                                if ($row['course_status'] == 1) {
                                                    echo 'เปิดใช้งาน';
                                                } else {
                                                    echo 'ปิดใช้งาน';
                                                }
                                                ?>
                                            </td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dataModal<?php echo $row['course_id'] ?>"><i class="fab fa-readme"></i></button></td>
                                        <?php } ?>
                                    </tr>

                                    <!-- Modal read-->
                                    <div class="modal fade" id="dataModal<?php echo $row['course_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable ">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:rgb(255,235,205);">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-book-medical"></i> หลักสูตร <?php echo $row['course_name'] ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>สถานะหลักสูตร :
                                                        <?php
                                                        if ($row['course_status'] == 1) {
                                                            echo '<u>เปิดใช้งาน</u>';
                                                        } else {
                                                            echo '<u>ปิดใช้งาน</u>';
                                                        }
                                                        ?>
                                                    </p>
                                                    <p>รหัสหลักสูตร : <?php echo $row['course_id'] ?></p>
                                                    <p>ชื่อหลักสูตร : <?php echo $row['course_name'] ?></p>
                                                    <p>หน่วยงานที่รับผิดชอบ : <?php echo $row['course_institution'] ?></p>
                                                    <p>รายละเอียด : <?php echo $row['course_detail'] ?></p>
                                                </div>
                                                <div class="modal-footer" style="background-color:rgb(255,235,205);">

                                                    <?php if ($row['course_status'] == 1) { ?>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#updateStatusOffModal<?php echo $row['course_id'] ?>"><i class="fas fa-user-times"></i> ปิดใช้งาน</i></button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateStatusOnModal<?php echo $row['course_id'] ?>"><i class="fas fa-user-check"></i> เปิดใช้งาน</i></button>
                                                    <?php } ?>
                                                    
                                                    <a href="../functionsH/courseU.php?course_id=<?php echo $row['course_id']; ?>">
                                                    <button type="button" class="btn btn-primary" ><i class="fas fa-edit"></i>แก้ไข</button>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal read -->

                                    <!-- Modal update status  on-->
                                    <div class="modal fade" id="updateStatusOnModal<?php echo $row['course_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">คุณต้องการที่จะ " เปิด " สถานะหลักสูตร ?</h5>
                                                </div>
                                                <div class="modal-body">โปรดยืนยัน</div>
                                                <div class="modal-footer">
                                                    <a href="../functionsHdb/CourseONdb.php?course_id=<?= $row['course_id'] ?>&value=1"><button class="btn btn-success">ยืนยัน</button></a>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal update status  on-->

                                    <!-- Modal update status  off-->
                                    <div class="modal fade" id="updateStatusOffModal<?php echo $row['course_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">คุณต้องการที่จะ " ปิด " สถานะหลักสูตร ?</h5>
                                                </div>
                                                <div class="modal-body">โปรดยืนยัน</div>
                                                <div class="modal-footer">
                                                    <a href="../functionsHdb/CourseOFFdb.php?course_id=<?= $row['course_id'] ?>"><button class="btn btn-success">ยืนยัน</button></a>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal update status  off-->






                                <?php } ?><!--  foreach -->
                            </tbody>
                        </table>




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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
<?php
include '../basic/chackSESSION.php';
chackForH($conn);
?>