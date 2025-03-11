<?php

session_start();
$isLoggedIn = isset($_SESSION['User_Username']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "termpro";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['User_Username'];
    $email = $_POST['User_Email'];
    $password = $_POST['User_Password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (User_Username, User_Email, User_Password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            header("Location: login.php?register_success=true"); // ไปหน้าล็อกอินหลังสมัครสำเร็จ
            exit();
        } else {
            $error_message = "เกิดข้อผิดพลาด: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "รหัสผ่านไม่ตรงกัน!";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <style>
        /* ส่วนของพื้นหลัง */
        body {
            font-family: 'Kanit'; 
            text-align: center; 
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            align-items: center;
        }
        .navbar {
            width: 100%;
            height: 50px;
            background-color: black;
            font-weight: bold;
            color: #fff;
            padding: 10px 20px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            z-index: 1000;
            top: 0 ;
            left: 0;
        }
        .navbar h2 {
            font-size: 1.5em;
            margin: 0;
        }
        .nav-links {
            margin-left: -680px ;
            display: flex;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            font-size: 1em;
        }
        .navbar a:hover {
            color: black;
            background-color: #fff;
            border-radius: 20px;
        }
        .navbar a.active {
            color: black;
            background-color: #fff;
            border-radius: 20px;
        }

        /* กล่องสมัครสมาชิก */
        .register-container {
            margin: 100px auto;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(15px);
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
            width: 380px;
            text-align: center;
            position: relative;
        }

        /* เส้นคั่นด้านบน */
        .register-container::before {
            content: '';
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 30px;
            color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #ddd;
            font-weight: bold;
            text-align: left;
            width: 100%;
        }

        /* ช่องกรอกข้อมูล */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            outline: none;
            transition: 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.15);
        }

        /* ปุ่มสมัครสมาชิก */
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        /* ข้อความแจ้งข้อผิดพลาด */
        .error-message {
            color: #ff7070;
            font-size: 14px;
            margin-top: 15px;
        }

        /* ลิงก์กลับไปหน้าล็อกอิน */
        .login-link {
            margin-top: 20px;
            display: block;
            color: #ddd;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s ease;
        }

        .login-link:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <div class="navbar">
        <h2>FMIN notebook</h2>
        <div class="nav-links">
            <a href="home.php" class="<?= ($current_page == 'home.php') ? 'active' : ''; ?>">หน้าหลัก</a>
            <a href="cart.php" class="<?= ($current_page == 'cart.php') ? 'active' : ''; ?>">ตะกร้า</a>
        </div>
        <div>
        <?php if ($isLoggedIn): ?>
            <a href="#" class="username"><?php echo htmlspecialchars($_SESSION['User_Username']); ?></a>
            <a href="logout.php" class="<?= ($current_page == 'logout.php') ? 'active' : ''; ?>">ออกจากระบบ</a>
        <?php else: ?>
            <a href="login.php" class="<?= ($current_page == 'login.php') ? 'active' : ''; ?>">เข้าสู่ระบบ</a>
            <a href="register.php" class="<?= ($current_page == 'register.php') ? 'active' : ''; ?>">สมัครสมาชิก</a>
        <?php endif; ?>
    </div>
    </div>
    <div class="register-container">
        <h2>สมัครสมาชิก</h2>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" id="username" name="User_Username" required>
            <label for="email">อีเมล:</label>
            <input type="email" id="email" name="User_Email" required>
            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="User_Password" required>
            <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="submit" value="สมัครสมาชิก">
        </form>
        <a class="login-link" href="login.php">มีบัญชีผู้ใช้อยู่แล้ว? เข้าสู่ระบบ</a>
    </div>
</body>
</html>
