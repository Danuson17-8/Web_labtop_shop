<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "termpro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = isset($_GET['table']) ? $_GET['table'] : 'products_standard';

// ดึงข้อมูลสินค้า
$sql = "SELECT Product_Id, Product_Name, Product_Description, Product_Price, Product_Image1, Product_Image2, Product_Stock FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
            echo "<div class='product-image-container'>
                <img src='" . $row['Product_Image1'] . "' alt='" . $row['Product_Name'] . "' class='default-image'>
                <img src='" . $row['Product_Image2'] . "' alt='" . $row['Product_Name'] . "' class='hover-image'>
            </div>";
            echo "<div class='product-name'>" . $row['Product_Name'] . "</div>";
            $description = $row['Product_Description'];
            echo "<div class='product-description'>" . (strlen($description) > 100 ? substr($description, 0, 100) . '...' : $description) . "</div>";
            echo "<div class='product-price'>฿" . number_format($row['Product_Price'], 2) . "</div>";
            echo "<div class='product-stock'>คงเหลือ " . $row['Product_Stock'] . " ชิ้น</div>";
            // ปุ่มดูเพิ่มเติม
            echo "<a href='product_details.php?id=" . $row['Product_Id'] . "' class='button'>เพิ่มเติม</a>";
            // ฟอร์มปุ่มใส่ตะกร้า
            echo "<form action='add_to_cart.php' method='POST' style='display: inline;'>";
            echo "<input type='hidden' name='id' value='" . $row['Product_Id'] . "'>";
            echo "<input type='hidden' name='name' value='" . $row['Product_Name'] . "'>";
            echo "<input type='hidden' name='price' value='" . $row['Product_Price'] . "'>";
            echo "<input type='hidden' name='image' value='" . $row['Product_Image1'] . "'>";
            echo "<input type='number' name='quantity' value='1' min='1' max='" . $row['Product_Stock'] . "' style='width: 30px;'>";
            echo "<button type='submit' class='button buy'>ใส่ตะกร้า</button>";
            echo "</form>";
            echo "</div>";
    }
} else {
    echo "ไม่มีสินค้าในร้าน";
}

$conn->close();
?>
