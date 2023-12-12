<?php
session_start();
include "../functionsHdb/InstitutionRdb.php";
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
    <title>ข้อมูลหน่วยงาน</title>
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
    .column10 {
        width: 10%;
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
                    <div style="color:gray;">
                        <i class="fas fa-chevron-right"></i>&nbsp;จัดการข้อมูลหน่วยงาน
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
    <!-- Loading overlay -->
    <!-- <div class="loading">Loading...</div> -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="padding: 40px;">

                <div class="card">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title"><i class="fas fa-torii-gate"></i> ข้อมูลหน่วยงาน</h5>
                        </center>
                        <table class="table">
                            <thead style="background-color: rgb(178, 225, 254); color:black; text-align: center;">
                                <tr>
                                    <th>เลขที่ใบอนุญาต</th>
                                    <th>เลขทะเบียนหน่วยงาน</th>
                                    <th>ชื่อหน่วยงาน</th>
                                    <th>ที่ตั้ง</th>
                                    <th>เบอร์โทรศัพท์</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: rgb(240,255,255); color:black;">
                                <?php
                                foreach ($resultAll as $row) {
                                    $imageData = base64_encode($row['institution_logo']);
                                    $imageSrc = "data:image/jpeg/png;base64,{$imageData}";
                                ?>
                                    <tr>
                                        <center>
                                            <img src="<?= $imageSrc ?>" alt="Institution Logo" style="width: 150px; height: 150px; ">
                                        </center><br>
                                        <td style="text-align: center;"><?php echo $row['institution_number'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['institution_association'] ?></td>
                                        <td><?php echo $row['institution_name'] ?></td>

                                        <td><?php echo $row['institution_address'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['institution_telephone'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="gap-2 d-md-flex  justify-content-md-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">แก้ไข <i class="fas fa-edit"></i></button>
                        </div>

                        <!-- f updateModal -->
                        <form method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:rgb(255,235,205);">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขข้อมูลหน่วยงาน<br> <?php echo $row['institution_name'] ?></h1>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <img src="<?= $imageSrc ?>" alt="Institution Logo" style="width: 150px; height: 150px; ">
                                            </center><br>
                                            <div class="input-group">
                                                <span style="color:black;" for="institution_number" class="input-group-text" id="addon-wrapping">เลขที่ใบอนุญาต : </span>
                                                <input " type=" text" class="form-control" name="institution_number" value="<?php echo $row['institution_number']; ?>" title="ไม่อนุญาติให้แก้ไข" readonly>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span style="color:black;" for="institution_association" class="input-group-text" id="addon-wrapping">เลขทะเบียนหน่วยงาน : </span>
                                                <input type="text" class="form-control" name="institution_association" value="<?php echo $row['institution_association']; ?>" title="ไม่อนุญาติให้แก้ไข" readonly>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span style="color:black;" for="institution_name" class="input-group-text" id="addon-wrapping">ชื่อหน่วยงาน : </span>
                                                <input style="color:black;" type="text" class="form-control" name="institution_name" value="<?php echo $row['institution_name']; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group">
                                                <span for="institution_address">ที่ตั้ง (ตามทะเบียนบ้าน) : </span>
                                                <input type="text" class="form-control" name="institution_address" style="height: 100px; width: 500px;color:black;" value="<?php echo $row['institution_address']; ?>">
                                            </div><br>
                                            <div class="input-group">
                                                <span style="color:black;" for="institution_telephone" class="input-group-text" id="addon-wrapping">เบอร์โทรศัพท์ : </span>
                                                <input style="color:black;" type="text" class="form-control" name="institution_telephone" value="<?php echo $row['institution_telephone']; ?>" maxlength="10" pattern="[0-9]+" title="เบอร์โทรศัพท์ ต้องประกอบด้วยตัวเลขเท่านั้น!">
                                            </div>
                                            <br>
                                            <div class="input-group" style="text-align: center;">
                                                <div class="column50">
                                                    <span for="institution_logo">อัพเดตรูปโลโก้ : <br></span>
                                                </div>
                                                <div class="column50">
                                                    <img width="50%" id="previewImage" alt="" style="padding: 10px;">
                                                    <input class="form-control" type="file" id="image" name="institution_logo" accept="image/jpeg, image/jpg, image/png">
                                                </div>
                                            </div><br>
                                        </div>
                                        <div class="modal-footer" style="background-color:rgb(255,235,205);">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="confUpdate()">บันทึก</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">ยกเลิก</button>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- updateModal -->
                        </form> <!-- f updateModal -->

                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- style="padding: 40px;" -->
        </div> <!-- row justify-content-center -->
    </div> <!-- container-fluid  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confUpdate() {
            var institution_name = document.querySelector('[name="institution_name"]').value;
            var institution_number = document.querySelector('[name="institution_number"]').value;
            var institution_association = document.querySelector('[name="institution_association"]').value;
            var institution_address = document.querySelector('[name="institution_address"]').value;
            var institution_telephone = document.querySelector('[name="institution_telephone"]').value;
            var institution_logo = document.querySelector('[name="institution_logo"]').value;

            if (institution_name.trim() === '') {
                Swal.fire({
                    title: 'โปรดกรอกชื่อหน่วยงาน',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else if (institution_address.trim() === '') {
                Swal.fire({
                    title: 'โปรดกรอกที่ตั้ง',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else if (institution_telephone.trim() === '') {
                Swal.fire({
                    title: 'โปรดกรอกเบอร์โทรศัพท์',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else if (!/^\d+$/.test(institution_telephone)) {
                Swal.fire({
                    title: 'หมายเลขโทรศัพท์ต้องเป็นตัวเลขเท่านั้น',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                Swal.fire({
                    text: 'โปรดยืนยันการบันทึกข้อมูลหน่วยงาน',
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
include '../basic/chackSESSION.php';
chackForH($conn);
include '../functionsHdb/InstitutionUdb.php';
?>