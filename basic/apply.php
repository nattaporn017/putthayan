<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>สมัครอาสากู้ภัย</title>
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

<body style="color:black; background-color: rgb(153, 0, 0);">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="padding: 40px;">

                <div class="card" style="color: black;">
                    <div class="card-body" style="background-color:rgb(255,235,205); ">
                        <h5 class="card-title" style="text-align: center;"><i class="fas fa-torii-gate"></i> สมัครอาสากู้ภัย</h5>
                        <hr>
                        <label style="color:red; font-size: small;">* ผู้สมัครจะต้องมีอายุ ไม่ต่ำกว่า 18 ปี</label><br>
                        <label style="color:red; font-size: small;">* โปรดกรอกข้อมูลให้ครบทุกช่อง</label><br>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="col-6 border-right" style="background-color:rgb(255,235,205);padding: 0px 40px 0px 40px;">
                                    <div class=" input-group">
                                        <span style="background-color: #DCDCDC; color:black" for="national_id" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>รหัสประจำตัวประชาชน :
                                        </span>
                                        <input type="text" class="form-control" name="national_id" maxlength="13" pattern="[0-9]+" title="รหัสประจำตัวประชาชน ต้องประกอบด้วยตัวเลขเท่านั้น!" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="name" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>ชื่อ :
                                        </span>
                                        <input type="text" class="form-control" name="name" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="surname" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>นามสกุล :
                                        </span>
                                        <input type="text" class="form-control" name="surname" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span for="gender">
                                            <lable style="color:red; font-size: small;">*</lable>เพศ :
                                        </span><br>
                                        <div class="column5">
                                        </div>
                                        <div class="column10">
                                            <label><input type="radio" name="gender" value="ชาย" required>ชาย</label>
                                        </div>
                                        <div class="column10">
                                            <label><input type="radio" name="gender" value="หญิง" required>หญิง</label>
                                        </div>
                                    </div>
                                    <lable style="color:red; font-size: small;"> * ปี คริสต์ศักราช (ค.ศ)</lable>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="birthday" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>วัน/เดือน/ปี เกิด :
                                        </span>
                                        <input type="date" class="form-control" name="birthday" title="วัน/เดือน/ปี เกิด ต้องไม่ใช่วันนี้หรือวันล่วงหน้า">
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="nationality" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>สัญชาติ :
                                        </span>
                                        <input type="text" class="form-control" name="nationality" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="extraction" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>เชื้อชาติ :
                                        </span>
                                        <input type="text" class="form-control" name="extraction" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="religion" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>ศาสนา :
                                        </span>
                                        <input type="text" class="form-control" name="religion" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="email" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>อีเมล์ :
                                        </span>
                                        <input type="email" class="form-control" placeholder="email" name="email" title="กรุณากรอกอีเมล์ให้ถูกต้อง (ต้องมี @gmail.com)" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span style="background-color: #DCDCDC;color:black" for="telephone" class="input-group-text">
                                            <div style="color:red; font-size: small;">*</div>เบอร์โทรศัพท์ :
                                        </span>
                                        <input type="text" class="form-control" name="telephone" maxlength="10" pattern="[0-9]+" title="เบอร์โทรศัพท์ ต้องประกอบด้วยตัวเลขเท่านั้น!" required>
                                    </div><br>
                                </div>
                                <div class="col-6" style="background-color: rgb(255,235,205);border-radius:50px;padding: 0px 40px 0px 40px;">
                                    <div class="input-group">
                                        <span for="health">
                                            <lable style="color:red; font-size: small;">*</lable>สุขภาพ / โรคประจำตัว :
                                        </span>
                                        <input type="text" class="form-control" name="health" style="height: 100px; width: 500px;" required>
                                    </div><br>

                                    <div class="input-group">
                                        <span for="address">
                                            <lable style="color:red; font-size: small;">*</lable>ที่อยู่ (ตามสำเนาทะเบียนบ้าน) :
                                        </span>
                                        <input type="text" class="form-control" name="address" style="height: 100px; width: 500px;" required>
                                    </div><br>
                                    <div class="input-group">
                                        <span for="lawsuit">
                                            <lable style="color:red; font-size: small;">*</lable>ประวัติต้องโทษ คดีแพ่ง / อาญา :
                                        </span><br>
                                        <div class="column5">
                                        </div>
                                        <div class="column20">
                                            <label><input type="radio" name="lawsuit" value="ไม่เคย" required>ไม่เคย</label>
                                        </div>
                                        <div class="column10">
                                            <label><input type="radio" name="lawsuit" value="เคย" required>เคย</label>
                                        </div>
                                    </div><br>
                                    <div class="input-group">
                                        <span for="cause"><label style="color: red;">*</label>สาเหตุที่ต้องโทษ : ( หากไม่เคยให้ขีด - )</span>
                                        <input type="text" class="form-control" name="cause" style="height: 100px; width: 500px;" required>
                                    </div><br>
                                    <input type="hidden" name="position" value="อาสากู้ภัย">
                                    <input type="hidden" name="status" value="1">
                                    <div class="input-group" style="text-align: center;">
                                        <div class="column50">
                                            <span for="image">
                                                <lable style="color:red; font-size: small;">*</lable>อัพโหลดรูปประจำตัว : <br>
                                            </span>
                                        </div>
                                        <div class="column50">
                                            <img width="50%" id="previewImage" alt="" style="padding: 10px;">
                                            <input class="form-control" type="file" id="image" name="image" accept="image/jpeg, image/jpg, image/png" required>
                                        </div>
                                    </div><br>
                                    <div class="space box" align="right">
                                        <button type="button" class="btn btn-success" style="padding: 10px 20px 10px 20px" onclick="confCreate()">บันทึก</button>
                                        <button type="reset" class="btn btn-secondary" style="padding: 10px 20px 10px 20px">คืนค่า</button>
                                        <a href='../index.php'><button type="button" class="btn btn-danger" style="padding: 10px 20px 10px 20px">ยกเลิก</button></a>
                                    </div>
                        </form>


                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- style="padding: 40px;" -->
        </div> <!-- row justify-content-center -->
    </div> <!-- container-fluid  -->

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
        var position = document.querySelector('[name="position"]').value;
        var status = document.querySelector('[name="status"]').value;
        var image = document.querySelector('[name="image"]').value;
        var lawsuit = document.querySelector('[name="lawsuit"]').value;
        var cause = document.querySelector('[name="cause"]').value;

        var today = new Date();
        var inputBirthday = new Date(birthday);
        today.setDate(today.getDate() - 1);
        var age = today.getFullYear() - inputBirthday.getFullYear();

        if (national_id.trim() === '' || name.trim() === '' || surname.trim() === '' || gender.trim() === '' ||
            birthday.trim() === '' || nationality.trim() === '' || extraction.trim() === '' ||
            religion.trim() === '' || health.trim() === '' || email.trim() === '' || telephone.trim() === '' ||
            address.trim() === '' || lawsuit.trim() === '' || cause.trim() === '' ||
            position.trim() === '' || status.trim() === '' ||
            image.trim() === '') {
            Swal.fire({
                title: 'โปรดกรอกข้อมูลให้ครบทุกช่อง',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (age <= 18) {
            Swal.fire({
                title: 'คุณอายุต่ำกว่า 18 ปี ไม่มีสิทธิ์สมัครอาสากู้ภัย',
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
        } else if (!/^\d+$/.test(national_id)) {
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
    // ฟังก์ชันเพื่อแสดงตัวอย่างรูปภาพ
    function previewImage() {
        // รับ Element ของ Input File
        var input = document.getElementById('image');
        // ตรวจสอบว่ามีการเลือกรูปหรือไม่
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            // เมื่อโหลดไฟล์เสร็จสิ้น
            reader.onload = function(e) {
                // นำ URL ของรูปที่โหลดมาใส่ใน src ของ Element รูปภาพ
                document.getElementById('previewImage').src = e.target.result;
            };
            // อ่านข้อมูลของไฟล์รูปภาพ
            reader.readAsDataURL(input.files[0]);
        }
    }
    // เพิ่ม Event Listener เมื่อมีการเปลี่ยนแปลงใน Input File
    document.getElementById('image').addEventListener('change', previewImage);
</script>

</html>
<?php
include '../basic/applydb.php'
?>