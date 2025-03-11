<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "termpro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $item) {
        // ลดจำนวนสินค้าตามจำนวนที่ซื้อ
        $quantity = intval($item['quantity']);
        $productId = intval($id);

        if ($productId < 200) {
            $from = 'products_standard' ;
        } else if ($productId < 300) {
            $from = 'products_gaming' ;
        } else if ($productId < 400) {
            $from = 'products_mac' ;
        }
        
        // อัปเดตสต็อกสินค้าในฐานข้อมูล
        $sql = "UPDATE $from SET Product_Stock = Product_Stock - $quantity WHERE Product_Id = $productId AND Product_Stock >= $quantity";
        $conn->query($sql);
    }
    
    // ล้างตะกร้าหลังจากสั่งซื้อเสร็จสิ้น
    $_SESSION['cart'] = [];

    echo "<h1>สั่งซื้อเสร็จสิ้น</h1>";
    echo "<p>ขอบคุณที่สั่งซื้อสินค้ากับเรา!</p>";
} else {
    echo "<h1>ไม่มีสินค้าในตะกร้า</h1>";
}

$conn->close();
?>
<html lang="th">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">

<a href="home.php" class="button">กลับสู่หน้าหลัก</a>

<style>
    body { margin: 100px auto; font-family: 'Kanit'; text-align: center; }
    .button { margin-top: 20px; padding: 8px 16px; font-size: 1em; color: #fff; background-color: black; border: none; border-radius: 4px; text-decoration: none; }
</style>
