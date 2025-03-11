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

$table = isset($_GET['table']) ? $_GET['table'] : 'products_standard';

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
$isLoggedIn = isset($_SESSION['User_Username']);
?>

<!DOCTYPE html>
<html lang="th">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
<div class="image-container">
        <img src="images/logo.png" alt="HP Spectre x360" class="fade-image">
    </div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMIN</title>
    <style>
        body { 
            font-family: 'Ubuntu';
            margin: 0; 
            display: flex; 
            flex-direction: column;
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
        }
        
        /* สไตล์แถบเมนูด้านบน */
        .navbar {
            font-family: 'Kanit';
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

        /* logo */
        .image-container {
            position: fixed;
            top: 10px;
            left: 20px;
            z-index: 2000;
        }

        .fade-image {
            width: 200px;
            transition: opacity 0.5s ease;
        }

        .content {
            margin-top: 250px;
            padding: 20px;
        }

        /* เเสดงสินค้า */

        .products { 
            display: flex; 
            flex-wrap: wrap; 
            justify-content: space-between; 
            margin: 8px auto;
        }
        .product { 
            font-family: 'Kanit';
            border: 1px solid #ddd; 
            padding: 16px; 
            margin: 16px; 
            width: calc(25% - 32px); 
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .product img { 
            width: 100%; 
            height: 170px;
            object-fit: cover;
        }
        .product-image-container {
            position: relative;
            display: inline-block;
            width: 100%; 
            height: 190px;
            object-fit: cover;
        }

        .default-image {
            display: block;
        }

        .hover-image {
            display: none;
            position: absolute;
            top: 0;
            left: 0; 
        }

        .product-image-container:hover .default-image {
            display: none;
        }

        .product-image-container:hover .hover-image {
            display: block;
        }

        .product-name { font-size: 1.1em; font-weight: bold; margin: 8px 0; }
        .product-description { font-size: 0.9em; }
        .product-price { font-size: 0.8em; color: green; font-weight: bold; margin-top: 8px; text-align: center;}
        .product-stock { font-size: 0.8em; color: red; text-align: center;}
        .button {
            font-family: 'Kanit';
            margin-top: 8px; 
            margin-left: 25px; 
            margin-right: 25px; 
            padding: 6px 10px; 
            font-size: 0.9em; 
            cursor: pointer; 
            color: #fff; 
            background-color: black; 
            border: none; 
            border-radius: 4px;
            text-decoration: none;
        }
        .button.buy { background-color: #28a745; }

        /* Pagination */
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 90px auto;
            margin-bottom: 40px;
            width: 510px;
            height: 90px;
            border-radius: 30px;
            overflow: hidden;
            color: white;
            background-color: black;
        }

        .pagination li {
            flex-grow: 1;
        }

        .pagination li a {
            display: block;
            height: 70px;
            width: 110px;
            text-align: center;
            line-height: 70px;
            color: #fff;
            font-weight: bold;
            background-color: black;
            text-decoration: none;
            margin: 10px;
            border-radius: 10px;
            clip-path: polygon(10% 0, 100% 0, 90% 100%, 0 100%);
        }

        .pagination li.arrow.left-arrow a {
            height: 70px;
            width: 40px;
            border-radius: 30px;
            background-color: #fff;
            color: black;
            clip-path: polygon(0 100%, 0 0, 100% 0, 75% 100%);
            font-weight: bold;
            line-height: 60px;
            position: relative;
        }

        .pagination li.arrow.right-arrow a {
            height: 70px;
            width: 40px;
            border-radius: 30px;
            background-color: #fff;
            color: black;
            clip-path: polygon(25% 0, 100% 0, 100% 100%, 0 100%);
            font-weight: bold;
            line-height: 60px;
            position: relative;
        }

        .pagination li.arrow.left-arrow a:hover {
            transform: translateX(-5px) scale(1.1);
        }
        .pagination li.arrow.right-arrow a:hover {
            transform: translateX(5px) scale(1.1);
        }

        .pagination li.active a {
            background-color: #fff;
            color: #333;
        }

        .pagination li a:hover {
            background-color: #555;
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

<script>
    window.addEventListener('scroll', function() {
    const image = document.querySelector('.fade-image');
    const scrollPosition = window.scrollY;
    const maxScroll = 200;
    const opacity = Math.max(1 - scrollPosition / maxScroll, 0);
    image.style.opacity = opacity;
});

let currentTable = 'products_standard';
let currentPage = 1;

function loadProducts(tableName, page) {
    currentTable = tableName;
    currentPage = page;

    if (page == 1) {
        currentTable = 'products_standard' ;
    } else if (page == 2) {
        currentTable = 'products_gaming' ;
    } else if (page == 3) {
        currentTable = 'products_mac' ;
    }

    const paginationItems = document.querySelectorAll('.pagination li');
    paginationItems.forEach((item, index) => {
        if (index === page) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    fetch(`get_products.php?table=${currentTable}&page=${page}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('product-container').innerHTML = data;
        })
        .catch(error => console.error('Error loading products:', error));
}
</script>

<!-- เมนู Pagination -->
<ul class="pagination">
  <li class="arrow left-arrow"><a href="#" onclick="loadProducts(currentTable, currentPage < 2 ? currentPage : currentPage - 1)">&lt;</a></li>
  <li class="<?= ($currentpage == 1) ? 'active' : ''; ?>"><a href="#" onclick="loadProducts('products_standard', 1)">Standard</a></li>
  <li class="<?= ($currentpage == 2) ? 'active' : ''; ?>"><a href="#" onclick="loadProducts('products_gaming', 2)">Gaming</a></li>
  <li class="<?= ($currentpage == 3) ? 'active' : ''; ?>"><a href="#" onclick="loadProducts('products_mac', 3)">MAC</a></li>
  <li class="arrow right-arrow"><a href="#" onclick="loadProducts(currentTable, currentPage > 2 ? currentPage : currentPage + 1)">&gt;</a></li>
</ul>

<div id="product-container" class="products">
    <?php
    if ($result->num_rows > 0) {
        // แสดงสินค้าแต่ละรายการ
        while($row = $result->fetch_assoc()) {
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
    ?>
</div>

<?php
$conn->close();
?>

</body>
</html>
