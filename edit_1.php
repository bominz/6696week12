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

        .confirmation-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }

        .alert {
            margin-bottom: 20px;
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
            .confirmation-container {
                padding: 15px;
            }
        }
    </style>

    <title>ยืนยันการแก้ไขข้อมูล</title>
</head>

<body>
    <div class="container confirmation-container">
        <?php
        // ตรวจสอบข้อมูลที่ส่งมา
        $id = $_POST['id'];
        $owner_name = $conn->real_escape_string($_POST['owner_name']);
        $computer_type = $conn->real_escape_string($_POST['computer_type']);
        $brand = $conn->real_escape_string($_POST['brand']);
        $model = $conn->real_escape_string($_POST['model']);
        $processor = $conn->real_escape_string($_POST['processor']);
        $ram = $conn->real_escape_string($_POST['ram']);

        // เขียนคำสั่ง SQL เพื่ออัปเดตข้อมูล
        $sql = "UPDATE computer_specs_simple SET 
                owner_name='$owner_name',
                computer_type='$computer_type',
                brand='$brand',
                model='$model',
                processor='$processor',
                ram='$ram'
                WHERE id=$id";

        // ประมวลผลคำสั่ง SQL
        if ($conn->query($sql) === TRUE) {
            ?>
            <h1><i class="bi bi-check-circle text-success"></i> สำเร็จ</h1>
            
            <div class="alert alert-success">
                <strong>ยินดีด้วย!</strong> คุณได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว
            </div>

            <div class="btn-group">
                <a href="show.php" class="btn btn-primary">
                    <i class="bi bi-list-ul"></i> กลับหน้าแสดงข้อมูล
                </a>
                <a href="edit.php?action_even=edit&employee_id=<?php echo $employee_id; ?>" class="btn btn-secondary">
                    <i class="bi bi-pencil"></i> แก้ไขข้อมูลอีกครั้ง
                </a>
            </div>
            <?php
        } else {
            ?>
            <h1><i class="bi bi-x-circle text-danger"></i> เกิดข้อผิดพลาด</h1>
            
            <div class="alert alert-danger">
                <strong>ขออภัย!</strong> มีข้อผิดพลาดในการแก้ไขข้อมูล
                <p><?php echo $conn->error; ?></p>
            </div>

            <div class="btn-group">
                <a href="show.php" class="btn btn-secondary">
                    <i class="bi bi-list-ul"></i> กลับหน้าแสดงข้อมูล
                </a>
                <a href="edit.php?action_even=edit&employee_id=<?php echo $employee_id; ?>" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> ลองแก้ไขใหม่
                </a>
            </div>
            <?php
        }

        // ปิดการเชื่อมต่อ
        $conn->close();
        ?>

        <div class="footer mt-4">
            พัฒนาโดย 664485010 นายประกฤษฎิ์ ปลัดโส
        </div>
    </div>
</body>
</html>