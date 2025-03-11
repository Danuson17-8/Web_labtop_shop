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

// ตรวจสอบว่ามีการส่ง ID มาหรือไม่
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    if ($product_id < 200) {
        $from = 'products_standard' ;
    } else if ($product_id < 300) {
        $from = 'products_gaming' ;
    } else if ($product_id < 400) {
        $from = 'products_mac' ;
    }

    // ดึงข้อมูลสินค้าตาม ID
    $sql = "SELECT * FROM $from WHERE Product_Id = $product_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ดึงข้อมูลสินค้า
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูลสินค้า";
        exit;
    }
} else {
    echo "ไม่มีการระบุสินค้า";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['Product_Name']; ?> - รายละเอียดสินค้า</title>
    <style>
        body {
            font-family: 'Kanit';
            text-align: center;
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
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
        .product {
            margin: auto;
            margin-top: -80px;
            border: 1px solid #ddd;
            padding: 16px;
            width: 800px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .product img {
            width: 60%;
            height: auto;
        }
        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            margin: 8px 0;
        }
        .product-price {
            margin-top: 8px;
            color: green;
            font-weight: bold;
        }
        .product-stock {
            color: red;
            margin-bottom: 8px;
        }
        .product-description {
            font-size: 0.9em;
            margin-top: 8px;
            text-align: left;
        }
        .button {
            font-family: 'Kanit';
            margin-top: 8px;
            margin-right: 8px;
            margin-left: 8px;
            padding: 7px 10px;
            font-size: 1em;
            cursor: pointer;
            text-align: center;
            color: #fff;
            background-color: black;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .button.buy {
            background-color: #28a745;
        }
        h1 { margin: 100px auto; }
    </style>
</head>
<body>
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

    <h1>รายละเอียด</h1>

    <div class="product">
        <img src="<?php echo $row['Product_Image1']; ?>" alt="<?php echo $row['Product_Name']; ?>">
        <div class="product-name"><?php echo $row['Product_Name']; ?></div>
        <div class="product-description"><?php echo nl2br($row['Product_Description']); ?></div>
        <div class="product-price">฿<?php echo number_format($row['Product_Price'], 2); ?></div>
        <div class="product-stock">เหลือ <?php echo $row['Product_Stock']; ?> ชิ้น</div>
        <form action="add_to_cart.php" method="POST" style="display: inline;">
            <input type="hidden" name="id" value="<?php echo $row['Product_Id']; ?>">
            <input type="hidden" name="name" value="<?php echo $row['Product_Name']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['Product_Price']; ?>">
            <input type="hidden" name="image" value="<?php echo $row['Product_Image1']; ?>">
            <input type="number" name="quantity" value="1" min="1" max="<?php echo $row['Product_Stock']; ?>" style="width: 50px;">
            <button type="submit" class="button buy">ใส่ตะกร้า</button>
        </form>
        <a href="home.php" class="button">กลับสู่หน้าหลัก</a>
    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>
