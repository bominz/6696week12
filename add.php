<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพนักงาน | ระบบจัดการข้อมูลพนักงาน</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .page-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
        }

        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 20px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }

        .form-control, .form-select {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
            }
        }
    </style>

    <title>เพิ่มข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container page-container">
        <h1 class="text-center">เพิ่มข้อมูลพนักงาน</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate id="employeeForm">
            <div class="row mb-3">
                <label for="employee_id" class="col-sm-3 col-md-2 col-form-label">รหัสพนักงาน</label>
                <div class="col-sm-9 col-md-4">
                    <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสพนักงาน
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="first_name" class="col-sm-3 col-md-2 col-form-label">ชื่อ</label>
                <div class="col-sm-9 col-md-4">
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อ
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="last_name" class="col-sm-3 col-md-2 col-form-label">นามสกุล</label>
                <div class="col-sm-9 col-md-4">
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                    <div class="invalid-feedback">
                        กรุณากรอกนามสกุล
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="department" class="col-sm-3 col-md-2 col-form-label">ตำแหน่ง</label>
                <div class="col-sm-9 col-md-4">
                    <select name="department" id="department" class="form-select" required>
                        <option value="" selected disabled>เลือกตำแหน่ง</option>
                        <option value="การเงิน">การเงิน</option>
                        <option value="บุคคล">บุคคล</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="ไอที">ไอที</option>
                        <option value="บริการลูกค้า">บริการลูกค้า</option>
                        <option value="คลังสินค้า">คลังสินค้า</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกตำแหน่ง
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="gender" class="col-sm-3 col-md-2 col-form-label">เพศ</label>
                <div class="col-sm-9 col-md-4">
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="" selected disabled>เลือกเพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกเพศ
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="age" class="col-sm-3 col-md-2 col-form-label">อายุ</label>
                <div class="col-sm-9 col-md-4">
                    <input type="number" class="form-control" id="age" name="age" min="18" max="65" required>
                    <div class="invalid-feedback">
                        กรุณากรอกอายุ (18-65)
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="salary" class="col-sm-3 col-md-2 col-form-label">เงินเดือน</label>
                <div class="col-sm-9 col-md-4">
                    <input type="number" class="form-control" id="salary" name="salary" min="0" required>
                    <div class="invalid-feedback">
                        กรุณากรอกเงินเดือน
                    </div>
                </div>
            </div>
            
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary me-2">
                    บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-danger me-2" onclick="window.location.href='show.php'">
                    ยกเลิก
                </button>
                <a href="show.php" class="btn btn-warning">
                    แสดงข้อมูล
                </a>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Include database connection
            include("conn.php");
            
            // Get form data and sanitize inputs
            $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $department = mysqli_real_escape_string($conn, $_POST['department']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $salary = mysqli_real_escape_string($conn, $_POST['salary']);
            
            // Insert data into database
            $sql = "INSERT INTO employees (employee_id, first_name, last_name, department, gender, age, salary) 
                    VALUES ('$employee_id', '$first_name', '$last_name', '$department', '$gender', '$age', '$salary')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success mt-3 text-center">
                        บันทึกข้อมูลเรียบร้อยแล้ว
                      </div>';
            } else {
                echo '<div class="alert alert-danger mt-3 text-center">
                        เกิดข้อผิดพลาด: ' . $conn->error . '
                      </div>';
            }
            
            // Close connection
            $conn->close();
        }
        ?>

        <div class="footer mt-4">
            พัฒนาโดย 664485010 นายประกฤษฎิ์ ปลัดโส
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>