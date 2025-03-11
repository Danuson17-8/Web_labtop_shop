
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `products_mac` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(200) NOT NULL,
  `Product_Description` text DEFAULT NULL,
  `Product_Price` decimal(10,2) NOT NULL,
  `Product_Image1` varchar(255) DEFAULT NULL,
  `Product_Image2` varchar(255) DEFAULT NULL,
  `Product_Stock` int(11) DEFAULT 0,
  PRIMARY KEY (`Product_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products_mac (Product_Id, Product_Name, Product_Description, Product_Price, Product_Image1, Product_Image2, Product_Stock) VALUES
(301, 'MacBook Air M1', 'MacBook ที่มีประสิทธิภาพสูงและน้ำหนักเบา
                                    หน่วยประมวลผล (CPU): Apple M1 
                                    RAM: 8GB 
                                    หน่วยความจำภายใน (Storage): SSD 256GB (สามารถเลือกได้สูงสุด 2TB) 
                                    ระบบปฏิบัติการ: macOS Big Sur (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 15 ชั่วโมง 
                                    พอร์ต: 
                                    2 x Thunderbolt 3 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 33900.00, 'images/macbook_air_m1.jpg', 'images/macbook_air_m1_1.jpg', 24),
(302, 'MacBook Pro 13 M1', 'MacBook Pro ที่มีประสิทธิภาพสำหรับการทำงานหนัก
                                    หน่วยประมวลผล (CPU): Apple M1 
                                    RAM: 8GB (สามารถเลือกได้สูงสุด 16GB) 
                                    หน่วยความจำภายใน (Storage): SSD 256GB (สามารถเลือกได้สูงสุด 2TB) 
                                    ระบบปฏิบัติการ: macOS Big Sur (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 20 ชั่วโมง 
                                    พอร์ต: 
                                    2 x Thunderbolt 3 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 42900.00, 'images/macbook_pro_13_m1.jpg', 'images/macbook_pro_13_m1_1.jpg', 25),
(303, 'MacBook Pro 16 M1', 'MacBook Pro ขนาด 16 นิ้วที่ทรงพลังที่สุด
                                    หน่วยประมวลผล (CPU): Apple M1 Pro หรือ M1 Max 
                                    RAM: 16GB (สามารถเลือกได้สูงสุด 64GB) 
                                    หน่วยความจำภายใน (Storage): SSD 512GB (สามารถเลือกได้สูงสุด 8TB) 
                                    ระบบปฏิบัติการ: macOS Big Sur (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 21 ชั่วโมง 
                                    พอร์ต: 
                                    3 x Thunderbolt 4 
                                    1 x HDMI 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 88900.00, 'images/macbook_pro_16_m1.jpg', 'images/macbook_pro_16_m1_1.jpg', 26),
(304, 'MacBook Air M2', 'MacBook Air รุ่นใหม่ที่มีประสิทธิภาพสูง
                                    หน่วยประมวลผล (CPU): Apple M2 
                                    RAM: 8GB (สามารถเลือกได้สูงสุด 24GB) 
                                    หน่วยความจำภายใน (Storage): SSD 256GB (สามารถเลือกได้สูงสุด 2TB) 
                                    ระบบปฏิบัติการ: macOS Monterey (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 18 ชั่วโมง 
                                    พอร์ต: 
                                    2 x Thunderbolt 4 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 42900.00, 'images/macbook_air_m2.jpg', 'images/macbook_air_m2_1.jpg', 27),
(305, 'MacBook Pro 14 M1', 'MacBook Pro ขนาด 14 นิ้วที่มีความหลากหลาย
                                    หน่วยประมวลผล (CPU): Apple M1 Pro 
                                    RAM: 16GB (สามารถเลือกได้สูงสุด 32GB) 
                                    หน่วยความจำภายใน (Storage): SSD 512GB (สามารถเลือกได้สูงสุด 4TB) 
                                    ระบบปฏิบัติการ: macOS Monterey (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 17 ชั่วโมง 
                                    พอร์ต: 
                                    3 x Thunderbolt 4 
                                    1 x HDMI 
                                    1 x SDXC card slot 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 62900.00, 'images/macbook_pro_14_m1.jpg', 'images/macbook_pro_14_m1_1.jpg', 28),
(306, 'MacBook Pro 13 M2', 'MacBook Pro รุ่นใหม่ที่มีพลังและประสิทธิภาพ
                                    หน่วยประมวลผล (CPU): Apple M2 
                                    RAM: 8GB (สามารถเลือกได้สูงสุด 24GB) 
                                    หน่วยความจำภายใน (Storage): SSD 256GB (สามารถเลือกได้สูงสุด 2TB) 
                                    ระบบปฏิบัติการ: macOS Monterey (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 20 ชั่วโมง 
                                    พอร์ต: 
                                    2 x Thunderbolt 4 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 42900.00, 'images/macbook_pro_13_m2.jpg', 'images/macbook_pro_13_m2_1.jpg', 29),
(307, 'MacBook Pro 16 M2', 'MacBook Pro ขนาด 16 นิ้วที่ทรงพลังที่สุดรุ่นใหม่
                                    หน่วยประมวลผล (CPU): Apple M2 Pro หรือ M2 Max 
                                    RAM: 16GB (สามารถเลือกได้สูงสุด 64GB) 
                                    หน่วยความจำภายใน (Storage): SSD 512GB (สามารถเลือกได้สูงสุด 8TB) 
                                    ระบบปฏิบัติการ: macOS Monterey (อัปเกรดเป็นเวอร์ชันใหม่ได้) 
                                    แบตเตอรี่: 21 ชั่วโมง 
                                    พอร์ต: 
                                    3 x Thunderbolt 4 
                                    1 x HDMI 
                                    1 x headphone jack 
                                    การเชื่อมต่อ: Wi-Fi 6, Bluetooth 5.0', 99900.00, 'images/macbook_pro_16_m2.jpg', 'images/macbook_pro_16_m2_1.jpg', 30);

COMMIT;