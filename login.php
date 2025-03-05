<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <!-- Fontawesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --secondary-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        }

        body {
            font-family: 'Itim', sans-serif;
            background: linear-gradient(45deg, #1c2b4a, #0f1a2e);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            perspective: 1000px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 500px;
            padding: 40px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.1),
                0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.5s ease;
            overflow: hidden;
            position: relative;
        }

        .login-wrapper:hover {
            transform: scale(1.03);
            box-shadow: 
                0 20px 45px rgba(0, 0, 0, 0.15),
                0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .login-header h1 {
            color: #333;
            font-size: 2.2rem;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            background-color: #f4f7f9;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: white;
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        .input-group-text {
            background-color: transparent;
            border: none;
            color: #6c757d;
        }

        .btn-primary, .btn-danger {
            border: none;
            border-radius: 12px;
            padding: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: var(--primary-gradient);
        }

        .btn-danger {
            background: var(--secondary-gradient);
        }

        .login-wrapper:hover .btn-primary,
        .login-wrapper:hover .btn-danger {
            transform: scale(1.05) translateY(-5px);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <h1>
                <i class="fas fa-user-lock text-primary me-3"></i>
                เข้าสู่ระบบ
            </h1>
        </div>
        
        <form action="chklogin.php" method="POST">
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" name="u_id" maxlength="30" required>
                </div>
            </div>
            
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="รหัสผ่าน" name="u_passwd" maxlength="30" required>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>เข้าสู่ระบบ
                    </button>
                </div>
                <div class="col-6">
                    <button type="reset" class="btn btn-danger w-100">
                        <i class="fas fa-times me-2"></i>ยกเลิก
                    </button>
                </div>
            </div>
        </form>
        
        <div class="footer">
            พัฒนาโดย 664485010 นายประกฤษฎิ์ ปลัดโส
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>