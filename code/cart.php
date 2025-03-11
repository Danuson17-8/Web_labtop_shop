<?php
session_start();
$isLoggedIn = isset($_SESSION['User_Username']);
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ฟังก์ชันคำนวณยอดรวม
function calculateTotal($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

if (isset($_GET['remove'])) {
    $removeId = intval($_GET['remove']);
    unset($_SESSION['cart'][$removeId]);
}

// คำนวณยอดรวม
$total = calculateTotal($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="th">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
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
        h1 {margin: 100px auto; }
        .cart { 
            width: 800px; 
            border: 1px solid #ddd; 
            padding: 16px; 
            margin: 16px auto; 
            margin-top: -70px; 
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;; 
        }
        .cart-item { display: flex; justify-content: space-between; padding: 8px 0; }
        .cart-item img { width: 50px; height: auto; }
        .cart-total { font-weight: bold; margin-top: 16px; margin-bottom: 16px; }
        .button { margin-top: 8px; padding: 8px 16px; font-size: 1em; cursor: pointer; text-align: center; color: #fff; background-color: black; border: none; border-radius: 4px; text-decoration: none; }
        .button.buy { background-color: #28a745; }
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
    <h1>ตะกร้าสินค้า</h1>
    <div class="cart">
        <?php
        if (empty($_SESSION['cart'])) {
            echo "<p>ไม่มีสินค้าในตะกร้า</p>";
        } else {
            foreach ($_SESSION['cart'] as $id => $item) {
                echo "<div class='cart-item'>";
                echo "<img src='" . $item['image'] . "' alt='" . $item['name'] . "'>";
                echo "<div>" . $item['name'] . " - ฿" . number_format($item['price'], 2) . " x " . $item['quantity'] . "</div>";
                echo "<a href='cart.php?remove=" . $id . "' class='button' style='background-color: red;'>ลบ</a>";
                echo "</div>";
            }
            // แสดงยอดรวม
            echo "<div class='cart-total'>ยอดรวม: ฿" . number_format($total, 2) . "</div>";
            echo "<a href='checkout.php' class='button buy'>ดำเนินการสั่งซื้อ</a>";
        }
        ?>
    </div>
    <a href="home.php" class="button">กลับสู่หน้าหลัก</a>
</body>
</html>
