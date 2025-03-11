
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `products_gaming` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(200) NOT NULL,
  `Product_Description` text DEFAULT NULL,
  `Product_Price` decimal(10,2) NOT NULL,
  `Product_Image1` varchar(255) DEFAULT NULL,
  `Product_Image2` varchar(255) DEFAULT NULL,
  `Product_Stock` int(11) DEFAULT 0,
  PRIMARY KEY (`Product_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products_gaming (Product_Id, Product_Name, Product_Description, Product_Price, Product_Image1, Product_Image2, Product_Stock) VALUES
(201, 'ASUS ROG Strix G15', 'โน้ตบุ๊กเกมมิ่งที่ทรงพลัง
                                    หน่วยประมวลผล (CPU): AMD Ryzen 9 5900HX 
                                    การ์ดจอ: NVIDIA GeForce RTX 3070 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 90WHr 
                                    พอร์ต: 
                                    3 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 64900.00, 'images/asus_rog_strix_g15.jpg', 'images/asus_rog_strix_g15_1.jpg', 4),
(202, 'HP Omen 15', 'โน้ตบุ๊กเกมมิ่งสำหรับนักเล่นเกม
                                    หน่วยประมวลผล (CPU): Intel Core i7-10750H 
                                    การ์ดจอ: NVIDIA GeForce GTX 1660 Ti 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 70WHr 
                                    พอร์ต: 
                                    1 x USB-C 
                                    3 x USB-A 
                                    1 x HDMI 
                                    1 x RJ-45 (Ethernet) 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 54900.00, 'images/hp_omen_15.jpg', 'images/hp_omen_15_1.jpg', 5),
(203, 'Dell XPS 15', 'โน้ตบุ๊กสำหรับการสร้างสรรค์งาน
                                    หน่วยประมวลผล (CPU): Intel Core i7-11800H 
                                    การ์ดจอ: NVIDIA GeForce RTX 3050 
                                    RAM: 32GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Pro (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 86WHr 
                                    พอร์ต: 
                                    2 x Thunderbolt 4 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x SD card reader 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 79900.00, 'images/dell_xps_15.jpg', 'images/dell_xps_15_1.jpg', 15),
(204, 'Acer Predator Helios 300', 'โน้ตบุ๊กเกมมิ่งที่คุ้มค่า
                                    หน่วยประมวลผล (CPU): Intel Core i7-11800H 
                                    การ์ดจอ: NVIDIA GeForce RTX 3060 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 58WHr 
                                    พอร์ต: 
                                    1 x USB-C 
                                    3 x USB-A 
                                    1 x HDMI 
                                    1 x RJ-45 (Ethernet) 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 47900.00, 'images/acer_predator_helios_300.jpg', 'images/acer_predator_helios_300_1.jpg', 22),
(205, 'Razer Blade 15', 'โน้ตบุ๊กเกมมิ่งที่ออกแบบมาอย่างลงตัว
                                    หน่วยประมวลผล (CPU): Intel Core i7-10875H 
                                    การ์ดจอ: NVIDIA GeForce RTX 3070 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 80WHr 
                                    พอร์ต: 
                                    3 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 84900.00, 'images/razer_blade_15.jpg', 'images/razer_blade_15_1.jpg', 3),
(206, 'MSI GS66 Stealth', 'โน้ตบุ๊กเกมมิ่งที่บางและเบา
                                    หน่วยประมวลผล (CPU): Intel Core i9-11900H 
                                    การ์ดจอ: NVIDIA GeForce RTX 3080 
                                    RAM: 32GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 99WHr 
                                    พอร์ต: 
                                    3 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 99900.00, 'images/msi_gs66_stealth.jpg', 'images/msi_gs66_stealth_1.jpg', 10),
(207, 'Gigabyte AORUS 15G', 'โน้ตบุ๊กเกมมิ่งที่ทรงพลัง
                                    หน่วยประมวลผล (CPU): Intel Core i7-10870H 
                                    การ์ดจอ: NVIDIA GeForce RTX 3060 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 94WHr 
                                    พอร์ต: 
                                    3 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 57900.00, 'images/gigabyte_aorus_15g.jpg', 'images/gigabyte_aorus_15g_1.jpg', 11),
(208, 'Alienware m15 R6', 'โน้ตบุ๊กเกมมิ่งที่มีดีไซน์เฉพาะตัว
                                    หน่วยประมวลผล (CPU): Intel Core i7-11800H 
                                    การ์ดจอ: NVIDIA GeForce RTX 3070 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 86WHr 
                                    พอร์ต: 
                                    2 x USB-A 
                                    2 x USB-C 
                                    1 x HDMI 
                                    1 x RJ-45 (Ethernet) 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 79900.00, 'images/alienware_m15_r6.jpg', 'images/alienware_m15_r6_1.jpg', 12),
(209, 'HP Pavilion Gaming Laptop', 'โน้ตบุ๊กเกมมิ่งราคาย่อมเยา
                                    หน่วยประมวลผล (CPU): AMD Ryzen 5 5600H 
                                    การ์ดจอ: NVIDIA GeForce GTX 1650 
                                    RAM: 8GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 52WHr 
                                    พอร์ต: 
                                    2 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x RJ-45 (Ethernet) 
                                    การเชื่อมต่อ: Wi-Fi 5, Bluetooth 5.0', 35900.00, 'images/hp_pavilion_gaming.jpg', 'images/hp_pavilion_gaming_1.jpg', 13);
COMMIT;