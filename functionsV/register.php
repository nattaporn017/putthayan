<?php
session_start();
include "../functionsHdb/CourseRdb.php";
$resultShowName = getShowName($conn);

include "../functionsVdb/SearchCoursedb.php";

// ตรวจสอบว่ามีการส่งค่า course_name_selection มาหรือไม่
$courseNameSelection = isset($_GET['course_name_selection']) ? $_GET['course_name_selection'] : "";

// ใช้คำสั่ง trim เพื่อลบช่องว่างที่อาจมีอยู่ที่ต้นและท้ายข้อความ
$courseNameSelection = trim($courseNameSelection);

$resultAll = getShearch($conn, $courseNameSelection);
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
    <title>ลงทะเบียนอบรม</title>
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

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

                        <i class="fas fa-chevron-right"></i>&nbsp;ลงทะเบียนอบรม
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
                <div class="container-fluid">
                    <div class=" align-items-center justify-content-center">
                        <!-- ทดสอบหน้าต่างจอ -->
                        <!-- start -->

                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div style="padding: 40px;">

                                    <div class="card" style="color: black;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;"><i class="fas fa-registered"></i> ลงทะเบียนอบรม</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="input-group" style="width: 250px;">
                                                        <span style="background-color: #DCDCDC;color:black" for="register_date" class="input-group-text">
                                                            วันที่ปัจจุบัน :
                                                        </span>
                                                        <input type="date" class="form-control" name="register_date" title="ไม่อนุญาติให้แก้ไข"  readonly>
                                                    </div><br>
                                                </div>
                                                <div class="col-2">
                                                    <form class="d-flex" method="GET" action="../functionsV/register.php" enctype="multipart/form-data">
                                                        <select name="course_name_selection" id="course_name_Selection" style="width: 200px;" class="form-select">
                                                            <option value="">เลือกหลักสูตร</option>
                                                            <?php foreach ($resultShowName as $row) : ?>
                                                                <option value="<?php echo $row['course_name']; ?>" <?php echo $row['course_name'] == $courseNameSelection ? 'selected' : ''; ?>>
                                                                    <?php echo $row['course_name']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="col-1"></div>
                                                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                                                    </form>
                                                </div><br><br>
                                                <table class="table ">
                                                    <thead style="background-color: rgb(178, 225, 254); color:black; text-align: center;">
                                                        <tr>
                                                            <th>ชื่อหลักสูตร</th>
                                                            <th>หน่วยงานที่รับผิดชอบ</th>
                                                            <th>วันที่เริ่มการอบรม</th>
                                                            <th>วันที่สิ้นสุดการอบรม</th>
                                                            <th>ลงทะเบียน</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="background-color: rgb(240,255,255); color:black;">
                                                        <?php if (!empty($resultAll)) : ?>
                                                            <?php foreach ($resultAll as $row) : ?>
                                                                <?php
                                                                // รับวันที่ปัจจุบันในรูปแบบ YYYY-MM-DD
                                                                $currentDate = date('Y-m-d');

                                                                // ตรวจสอบว่าวันที่เริ่ม (m_start) ไม่เท่ากับวันที่ปัจจุบัน และไม่เลยวันที่ปัจจุบัน
                                                                if ($row['m_start'] != $currentDate && $row['m_start'] > $currentDate) :
                                                                ?>
                                                                    <tr style="text-align: center;">
                                                                        <td style="text-align: left;"><?php echo $row['course_name']; ?></td>
                                                                        <td style="text-align: left;"><?php echo $row['course_institution']; ?></td>
                                                                        <td style="text-align: left;"><?php echo $row['m_start']; ?></td>
                                                                        <td style="text-align: left;"><?php echo $row['m_end']; ?></td>
                                                                        <td style="text-align: left;"></td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align: center;">ไม่พบรายการ</td>
                                                            </tr>
                                                        <?php endif; ?>

                                                    </tbody>

                                                </table>
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

<script>
    function getCurrentDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = (today.getMonth() + 1).toString().padStart(2, '0');
        const day = today.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    document.getElementById('currentDate').value = getCurrentDate();
    document.querySelector('input[name="register_date"]').value = getCurrentDate();
</script>

</html>