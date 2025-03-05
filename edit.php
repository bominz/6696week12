<!DOCTYPE html>
<html lang="en">
<?php
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .edit-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
        }

        .form-control, .form-select {
            border-radius: 8px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            .edit-container {
                padding: 15px;
            }

            .row {
                margin-bottom: 15px;
            }
        }
    </style>

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container edit-container">
        <?php
        if(isset($_GET['action_even'])=='edit'){
            $employee_id=$_GET['employee_id'];
            $sql="SELECT * FROM employees WHERE employee_id=$employee_id";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
            }else{
                echo "<div class='alert alert-danger'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
                exit();
            }
        }
        ?>

        <h1><i class="bi bi-pencil-square"></i> แก้ไขข้อมูลพนักงาน</h1>

        <form action="edit_1.php" method="POST">
            <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">รหัสพนักงาน</label>
                <div class="col-sm-9">
                    <div class="form-control bg-light" readonly>
                        <?php echo $row['employee_id']; ?>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ชื่อ</label>
                <div class="col-sm-9">
                    <input type="text" name="first_name" class="form-control" maxlength="50" 
                           value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">นามสกุล</label>
                <div class="col-sm-9">
                    <input type="text" name="last_name" class="form-control" maxlength="50" 
                           value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ตำแหน่ง</label>
                <div class="col-sm-9">
                    <select name="department" class="form-select" required>
                        <option value="">กรุณาระบุตำแหน่ง</option>
                        <?php 
                        $departments = [
                            'ฝ่ายการตลาด', 'ฝ่ายบัญชี', 
                            'ฝ่ายบุคคล', 'ฝ่ายผลิต', 'ฝ่ายไอที'
                        ];
                        foreach ($departments as $dept) {
                            $selected = ($row['department'] == $dept) ? 'selected' : '';
                            echo "<option value='$dept' $selected>$dept</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">เพศ</label>
                <div class="col-sm-9">
                    <select name="gender" class="form-select" required>
                        <option value="">กรุณาระบุเพศ</option>
                        <?php 
                        $genders = ['ชาย' => 'เพศชาย', 'หญิง' => 'เพศหญิง', 'อื่นๆ' => 'LGBTQ+'];
                        foreach ($genders as $value => $label) {
                            $selected = ($row['gender'] == $value) ? 'selected' : '';
                            echo "<option value='$value' $selected>$label</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">อายุ</label>
                <div class="col-sm-9">
                    <input type="number" name="age" class="form-control" min="18" max="100" 
                           value="<?php echo htmlspecialchars($row['age']); ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">เงินเดือน</label>
                <div class="col-sm-9">
                    <input type="number" name="salary" class="form-control" min="0" step="0.01" 
                           value="<?php echo htmlspecialchars($row['salary']); ?>" required>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> บันทึกข้อมูล
                </button>
                <button type="reset" class="btn btn-danger">
                    <i class="bi bi-x-circle"></i> ยกเลิก
                </button>
            </div>
        </form>

        <div class="footer">
            พัฒนาโดย 664485010 นายประกฤษฎิ์ ปลัดโส
        </div>
    </div>
</body>
</html>