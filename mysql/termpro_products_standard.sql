
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `products_standard` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(200) NOT NULL,
  `Product_Description` text DEFAULT NULL,
  `Product_Price` decimal(10,2) NOT NULL,
  `Product_Image1` varchar(255) DEFAULT NULL,
  `Product_Image2` varchar(255) DEFAULT NULL,
  `Product_Stock` int(11) DEFAULT 0,
  PRIMARY KEY (`Product_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products_standard (Product_Id, Product_Name, Product_Description, Product_Price, Product_Image1, Product_Image2, Product_Stock) VALUES

(101, 'Dell Inspiron 15', 'โน้ตบุ๊กทำงานที่เหมาะสำหรับผู้ใช้ทั่วไป
                                    หน่วยประมวลผล (CPU): Intel Core i5-1135G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 8GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 42WHr 
                                    พอร์ต: 
                                    2 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 39900.00, 'images/dell_inspiron_15.jpg', 'images/dell_inspiron_15.jpg', 14),
(102, 'Acer Aspire 5', 'โน้ตบุ๊กที่มีประสิทธิภาพดีในราคาที่คุ้มค่า
                                    หน่วยประมวลผล (CPU): AMD Ryzen 5 5500U 
                                    การ์ดจอ: Integrated AMD Radeon Graphics 
                                    RAM: 8GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 48WHr 
                                    พอร์ต: 
                                    2 x USB-A 
                                    1 x USB-C 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.1', 29900.00, 'images/acer_aspire_5.jpg', 'images/acer_aspire_5_1.jpg', 15),
(103, 'HP EliteBook 840 G7', 'โน้ตบุ๊กสำหรับธุรกิจที่มีความปลอดภัยสูง
                                    หน่วยประมวลผล (CPU): Intel Core i5-10210U 
                                    การ์ดจอ: Integrated Intel UHD Graphics 
                                    RAM: 16GB DDR4 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Pro (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 50WHr 
                                    พอร์ต: 
                                    2 x USB-C 
                                    2 x USB-A 
                                    1 x HDMI 
                                    1 x RJ-45 (Ethernet) 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 59900.00, 'images/hp_elitebook_840.jpg', 'images/hp_elitebook_840_1.jpg', 16),
(104, 'Lenovo Yoga 7i', 'โน้ตบุ๊ก 2-in-1 ที่สามารถใช้เป็นแท็บเล็ตได้
                                    หน่วยประมวลผล (CPU): Intel Core i7-1165G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 16GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 60WHr 
                                    พอร์ต: 
                                    2 x USB-C 
                                    1 x USB-A 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 49900.00, 'images/lenovo_yoga_7i.jpg', 'images/lenovo_yoga_7i_1.jpg', 17),
(105, 'Microsoft Surface Laptop 4', 'โน้ตบุ๊กที่เหมาะสำหรับผู้ใช้ที่ต้องการความพรีเมียม
                                    หน่วยประมวลผล (CPU): Intel Core i5-1135G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 8GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 45WHr 
                                    พอร์ต: 
                                    1 x USB-C 
                                    1 x USB-A 
                                    1 x Surface Connect 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 64900.00, 'images/microsoft_surface_laptop_4.jpg','images/microsoft_surface_laptop_4_1.jpg', 18),
(106, 'ASUS ZenBook 14', 'โน้ตบุ๊กพรีเมียมที่มีดีไซน์บางเบา
                                    หน่วยประมวลผล (CPU): Intel Core i7-1165G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 16GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 67WHr 
                                    พอร์ต: 
                                    1 x USB-C 
                                    2 x USB-A 
                                    1 x HDMI 
                                    1 x microSD card reader 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 59900.00, 'images/asus_zenbook_14.jpg', 'images/asus_zenbook_14_1.jpg', 19),
(107, 'Samsung Galaxy Book Pro 15', 'โน้ตบุ๊กที่มีน้ำหนักเบาและพกพาง่าย
                                    หน่วยประมวลผล (CPU): Intel Core i7-1160G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 16GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 68WHr 
                                    พอร์ต: 
                                    1 x USB-C 
                                    1 x USB-A 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 54900.00, 'images/samsung_galaxy_book_pro_15.jpg', 'images/samsung_galaxy_book_pro_15_1.jpg', 20),
(108, 'Razer Book 13', 'โน้ตบุ๊กสำหรับทำงานที่มาพร้อมกับดีไซน์สวยงาม
                                    หน่วยประมวลผล (CPU): Intel Core i7-1165G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 16GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 512GB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 63WHr 
                                    พอร์ต: 
                                    2 x USB-C 
                                    1 x USB-A 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 56900.00, 'images/razer_book_13.jpg', 'images/razer_book_13_1.jpg', 21),
(109, 'LG Gram 14', 'โน้ตบุ๊กที่มีน้ำหนักเบาที่สุดในตลาด
                                    หน่วยประมวลผล (CPU): Intel Core i7-1165G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 16GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Home (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 72WHr 
                                    พอร์ต: 
                                    2 x USB-C 
                                    2 x USB-A 
                                    1 x HDMI 
                                    1 x headphone/microphone combo jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 54900.00, 'images/lg_gram_14.jpg', 'images/lg_gram_14_1.jpg', 10),
(110, 'Lenovo ThinkPad X1 Carbon', 'โน้ตบุ๊กธุรกิจที่มีความทนทานสูง
                                    หน่วยประมวลผล (CPU): Intel Core i7-1165G7 
                                    การ์ดจอ: Integrated Intel Iris Xe Graphics 
                                    RAM: 16GB LPDDR4x 
                                    หน่วยความจำภายใน (Storage): SSD 1TB 
                                    ระบบปฏิบัติการ: Windows 10 Pro (สามารถอัปเกรดเป็น Windows 11) 
                                    แบตเตอรี่: 57WHr 
                                    พอร์ต: 
                                    2 x USB-C 
                                    2 x USB-A 
                                    1 x HDMI 
                                    1 x RJ-45 (Ethernet) 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 89900.00, 'images/lenovo_thinkpad_x1_carbon.jpg', 'images/lenovo_thinkpad_x1_carbon_1.jpg', 23);

COMMIT;