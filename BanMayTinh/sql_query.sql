-- Sản phẩm thuộc danh mục "SSD Samsung"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Samsung 870 EVO 500GB', 11, 100, 1290000, 'Dung lượng: 500GB, Chuẩn: SATA III, Tốc độ đọc: 560MB/s, Tốc độ ghi: 530MB/s', 'samsung-870-evo.jpg'),
('Samsung 980 PRO 1TB', 11, 50, 3990000, 'Dung lượng: 1TB, Chuẩn: PCIe 4.0 NVMe, Tốc độ đọc: 7000MB/s, Tốc độ ghi: 5100MB/s', 'samsung-980-pro.jpg'),
('Samsung T7 Portable 1TB', 11, 70, 2890000, 'Dung lượng: 1TB, Loại: SSD di động, Tốc độ truyền: 1050MB/s, Chống sốc', 'samsung-t7.jpg'),
('Samsung 860 QVO 1TB', 11, 80, 1990000, 'Dung lượng: 1TB, Chuẩn: SATA III, Tốc độ đọc: 550MB/s, Tốc độ ghi: 520MB/s', 'samsung-860-qvo.jpg'),
('Samsung 970 EVO Plus 500GB', 11, 90, 1790000, 'Dung lượng: 500GB, Chuẩn: PCIe NVMe, Tốc độ đọc: 3500MB/s, Tốc độ ghi: 3300MB/s', 'samsung-970-evo-plus.jpg');

-- Sản phẩm thuộc danh mục "SSD Western Digital"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('WD Blue SN570 500GB', 12, 120, 1390000, 'Dung lượng: 500GB, Chuẩn: PCIe NVMe, Tốc độ đọc: 3500MB/s, Tốc độ ghi: 2300MB/s', 'wd-blue-sn570.jpg'),
('WD Black SN850 1TB', 12, 60, 4890000, 'Dung lượng: 1TB, Chuẩn: PCIe 4.0 NVMe, Tốc độ đọc: 7000MB/s, Tốc độ ghi: 5300MB/s', 'wd-black-sn850.jpg'),
('WD Green SSD 240GB', 12, 150, 790000, 'Dung lượng: 240GB, Chuẩn: SATA III, Tốc độ đọc: 545MB/s, Tốc độ ghi: 465MB/s', 'wd-green-240gb.jpg'),
('WD My Passport SSD 1TB', 12, 50, 2790000, 'Dung lượng: 1TB, Loại: SSD di động, Tốc độ truyền: 1050MB/s, Bảo vệ bằng mật khẩu', 'wd-my-passport.jpg'),
('WD Red SSD 1TB', 12, 40, 3190000, 'Dung lượng: 1TB, Chuẩn: SATA III, Tốc độ đọc: 560MB/s, Tốc độ ghi: 530MB/s', 'wd-red-1tb.jpg');

-- Sản phẩm thuộc danh mục "RAM Corsair"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Corsair Vengeance RGB Pro 16GB', 16, 70, 1790000, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Đèn RGB', 'corsair-vengeance-rgb-pro.jpg'),
('Corsair Dominator Platinum 16GB', 16, 50, 3290000, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3600MHz, Thiết kế cao cấp', 'corsair-dominator-platinum.jpg'),
('Corsair ValueSelect 8GB', 16, 100, 790000, 'Dung lượng: 8GB, Loại: DDR4, Bus: 2400MHz, Giá rẻ', 'corsair-valueselect.jpg'),
('Corsair Vengeance LPX 32GB', 16, 40, 3090000, 'Dung lượng: 32GB (2x16GB), Loại: DDR4, Bus: 3000MHz, Tản nhiệt thấp', 'corsair-vengeance-lpx.jpg'),
('Corsair XMS3 4GB', 16, 200, 490000, 'Dung lượng: 4GB, Loại: DDR3, Bus: 1600MHz, Đáng tin cậy', 'corsair-xms3.jpg');

-- Sản phẩm thuộc danh mục "RAM G.Skill"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('G.Skill Trident Z RGB 16GB', 17, 60, 1990000, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Đèn RGB', 'gskill-trident-z.jpg'),
('G.Skill Ripjaws V 16GB', 17, 80, 1790000, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Tản nhiệt tốt', 'gskill-ripjaws-v.jpg'),
('G.Skill Aegis 8GB', 17, 120, 790000, 'Dung lượng: 8GB, Loại: DDR4, Bus: 3000MHz, Hiệu năng cao', 'gskill-aegis.jpg'),
('G.Skill Sniper X 32GB', 17, 30, 3090000, 'Dung lượng: 32GB (2x16GB), Loại: DDR4, Bus: 3400MHz, Thiết kế phong cách', 'gskill-sniper-x.jpg'),
('G.Skill Flare X 16GB', 17, 50, 1990000, 'Dung lượng: 16GB (2x8GB), Loại: DDR4, Bus: 3200MHz, Tối ưu cho AMD Ryzen', 'gskill-flare-x.jpg');

-- Sản phẩm thuộc danh mục "Pin Laptop Dell"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Pin Laptop Dell 45Wh', 21, 50, 1290000, 'Dung lượng: 45Wh, Tương thích: Dell Inspiron, Hiệu suất ổn định', 'pin-dell-45wh.jpg'),
('Pin Laptop Dell 65Wh', 21, 30, 1590000, 'Dung lượng: 65Wh, Tương thích: Dell Latitude, Độ bền cao', 'pin-dell-65wh.jpg'),
('Pin Laptop Dell 90Wh', 21, 20, 1990000, 'Dung lượng: 90Wh, Tương thích: Dell Precision, Hiệu năng tốt', 'pin-dell-90wh.jpg'),
('Pin Laptop Dell XPS 56Wh', 21, 25, 1890000, 'Dung lượng: 56Wh, Tương thích: Dell XPS, Sạc nhanh', 'pin-dell-xps.jpg'),
('Pin Laptop Dell Vostro 42Wh', 21, 40, 1290000, 'Dung lượng: 42Wh, Tương thích: Dell Vostro, Giá hợp lý', 'pin-dell-vostro.jpg');

-- Sản phẩm thuộc danh mục "Pin Laptop HP"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Pin Laptop HP 41Wh', 22, 60, 1190000, 'Dung lượng: 41Wh, Tương thích: HP Pavilion, Độ bền cao', 'pin-hp-41wh.jpg'),
('Pin Laptop HP 55Wh', 22, 40, 1490000, 'Dung lượng: 55Wh, Tương thích: HP Envy, Sạc nhanh', 'pin-hp-55wh.jpg'),
('Pin Laptop HP 75Wh', 22, 25, 1990000, 'Dung lượng: 75Wh, Tương thích: HP Spectre, Hiệu suất tốt', 'pin-hp-75wh.jpg'),
('Pin Laptop HP ProBook 44Wh', 22, 30, 1390000, 'Dung lượng: 44Wh, Tương thích: HP ProBook, Chất lượng chính hãng', 'pin-hp-probook.jpg'),
('Pin Laptop HP EliteBook 52Wh', 22, 35, 1790000, 'Dung lượng: 52Wh, Tương thích: HP EliteBook, Sử dụng lâu dài', 'pin-hp-elitebook.jpg');

-- Sản phẩm thuộc danh mục "Bàn phím Logitech"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Logitech K120', 31, 120, 290000, 'Loại: Có dây, Kết nối: USB, Phù hợp văn phòng', 'logitech-k120.jpg'),
('Logitech G213 Prodigy', 31, 60, 1290000, 'Loại: Có dây, Đèn LED RGB, Phím giả cơ', 'logitech-g213.jpg'),
('Logitech MX Keys', 31, 40, 2290000, 'Loại: Không dây, Kết nối: Bluetooth, Thiết kế cao cấp', 'logitech-mx-keys.jpg'),
('Logitech G PRO X', 31, 30, 2990000, 'Loại: Có dây, Phím cơ, Đèn RGB', 'logitech-g-pro-x.jpg'),
('Logitech K380', 31, 100, 890000, 'Loại: Không dây, Kết nối: Bluetooth, Nhỏ gọn', 'logitech-k380.jpg');

-- Sản phẩm thuộc danh mục "Chuột Logitech"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Logitech M331 Silent', 36, 150, 390000, 'Loại: Không dây, Độ phân giải: 1000DPI, Chống ồn', 'logitech-m331.jpg'),
('Logitech G502 HERO', 36, 60, 1290000, 'Loại: Có dây, Độ phân giải: 16000DPI, Đèn RGB', 'logitech-g502.jpg'),
('Logitech MX Master 3', 36, 50, 2290000, 'Loại: Không dây, Độ phân giải: 4000DPI, Thiết kế công thái học', 'logitech-mx-master-3.jpg'),
('Logitech G304 Lightspeed', 36, 80, 990000, 'Loại: Không dây, Độ phân giải: 12000DPI, Tăng tốc', 'logitech-g304.jpg'),
('Logitech M720 Triathlon', 36, 70, 890000, 'Loại: Không dây, Đa thiết bị, Pin lâu', 'logitech-m720.jpg');

-- Sản phẩm thuộc danh mục "Sạc Laptop Dell"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Sạc Laptop Dell 65W', 26, 80, 990000, 'Công suất: 65W, Tương thích: Dell Inspiron, Bảo vệ quá tải', 'sac-dell-65w.jpg'),
('Sạc Laptop Dell 90W', 26, 50, 1290000, 'Công suất: 90W, Tương thích: Dell XPS, Sạc nhanh', 'sac-dell-90w.jpg'),
('Sạc Laptop Dell 130W', 26, 30, 1590000, 'Công suất: 130W, Tương thích: Dell Alienware, Hiệu năng cao', 'sac-dell-130w.jpg'),
('Sạc Laptop Dell 45W', 26, 70, 890000, 'Công suất: 45W, Tương thích: Dell Latitude, Gọn nhẹ', 'sac-dell-45w.jpg'),
('Sạc Laptop Dell 180W', 26, 20, 1990000, 'Công suất: 180W, Tương thích: Dell Precision, Hiệu quả cao', 'sac-dell-180w.jpg');

-- Sản phẩm thuộc danh mục "Sạc Laptop HP"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Sạc Laptop HP 65W', 27, 100, 950000, 'Công suất: 65W, Tương thích: HP Pavilion, Chất lượng chính hãng', 'sac-hp-65w.jpg'),
('Sạc Laptop HP 90W', 27, 60, 1190000, 'Công suất: 90W, Tương thích: HP Envy, Sạc nhanh', 'sac-hp-90w.jpg'),
('Sạc Laptop HP 120W', 27, 40, 1490000, 'Công suất: 120W, Tương thích: HP Spectre, An toàn', 'sac-hp-120w.jpg'),
('Sạc Laptop HP 45W', 27, 80, 850000, 'Công suất: 45W, Tương thích: HP ProBook, Nhẹ và di động', 'sac-hp-45w.jpg'),
('Sạc Laptop HP 150W', 27, 20, 1790000, 'Công suất: 150W, Tương thích: HP ZBook, Hiệu suất mạnh', 'sac-hp-150w.jpg');

-- Sản phẩm thuộc danh mục "SSD Kingston"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('SSD Kingston A400 240GB', 14, 100, 890000, 'Dung lượng: 240GB, Tốc độ đọc: 500MB/s, Tốc độ ghi: 350MB/s, Loại: SATA III', 'ssd-kingston-a400-240gb.jpg'),
('SSD Kingston NV1 500GB', 14, 80, 1290000, 'Dung lượng: 500GB, Tốc độ đọc: 2100MB/s, Tốc độ ghi: 1700MB/s, Loại: NVMe PCIe Gen 3', 'ssd-kingston-nv1-500gb.jpg'),
('SSD Kingston KC3000 1TB', 14, 50, 2990000, 'Dung lượng: 1TB, Tốc độ đọc: 7000MB/s, Tốc độ ghi: 6000MB/s, Loại: NVMe PCIe Gen 4', 'ssd-kingston-kc3000-1tb.jpg'),
('SSD Kingston Fury Renegade 2TB', 14, 30, 5490000, 'Dung lượng: 2TB, Tốc độ đọc: 7300MB/s, Tốc độ ghi: 7000MB/s, Loại: NVMe PCIe Gen 4', 'ssd-kingston-renegade-2tb.jpg'),
('SSD Kingston Data Center 960GB', 14, 25, 4290000, 'Dung lượng: 960GB, Tốc độ đọc: 560MB/s, Tốc độ ghi: 520MB/s, Loại: SATA III, Phù hợp cho doanh nghiệp', 'ssd-kingston-datacenter-960gb.jpg');

-- Sản phẩm thuộc danh mục "RAM Kingston"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('RAM Kingston DDR4 8GB 2666MHz', 19, 150, 790000, 'Dung lượng: 8GB, Loại: DDR4, Tốc độ: 2666MHz, 1.2V', 'ram-kingston-ddr4-8gb-2666mhz.jpg'),
('RAM Kingston DDR4 16GB 3200MHz', 19, 100, 1490000, 'Dung lượng: 16GB, Loại: DDR4, Tốc độ: 3200MHz, XMP 2.0', 'ram-kingston-ddr4-16gb-3200mhz.jpg'),
('RAM Kingston Fury Beast RGB 16GB', 19, 80, 1790000, 'Dung lượng: 16GB, Loại: DDR4, Tốc độ: 3600MHz, Đèn RGB', 'ram-kingston-fury-beast-16gb.jpg'),
('RAM Kingston Fury Impact 32GB', 19, 40, 3990000, 'Dung lượng: 32GB, Loại: DDR5, Tốc độ: 4800MHz, Dùng cho laptop', 'ram-kingston-fury-impact-32gb.jpg'),
('RAM Kingston Server Premier 32GB', 19, 30, 5990000, 'Dung lượng: 32GB, Loại: DDR4 ECC, Tốc độ: 3200MHz, Dùng cho máy chủ', 'ram-kingston-server-premier-32gb.jpg');

-- Sản phẩm thuộc danh mục "RAM Samsung"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('RAM Samsung DDR4 8GB 2400MHz', 20, 120, 750000, 'Dung lượng: 8GB, Loại: DDR4, Tốc độ: 2400MHz, 1.2V', 'ram-samsung-ddr4-8gb-2400mhz.jpg'),
('RAM Samsung DDR4 16GB 3200MHz', 20, 90, 1350000, 'Dung lượng: 16GB, Loại: DDR4, Tốc độ: 3200MHz, Dùng cho laptop', 'ram-samsung-ddr4-16gb-3200mhz.jpg'),
('RAM Samsung DDR5 16GB 4800MHz', 20, 50, 1990000, 'Dung lượng: 16GB, Loại: DDR5, Tốc độ: 4800MHz, Hiệu suất cao', 'ram-samsung-ddr5-16gb-4800mhz.jpg'),
('RAM Samsung DDR5 32GB 5200MHz', 20, 30, 3990000, 'Dung lượng: 32GB, Loại: DDR5, Tốc độ: 5200MHz, Dùng cho máy trạm', 'ram-samsung-ddr5-32gb-5200mhz.jpg'),
('RAM Samsung Server ECC 64GB 3200MHz', 20, 20, 7890000, 'Dung lượng: 64GB, Loại: DDR4 ECC, Tốc độ: 3200MHz, Dùng cho máy chủ', 'ram-samsung-server-ecc-64gb.jpg');

-- Sản phẩm thuộc danh mục "Pin Laptop Apple"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Pin MacBook Pro 13"', 25, 40, 2490000, 'Dung lượng: 58Wh, Tương thích: MacBook Pro 13" 2018-2020, Chính hãng Apple', 'pin-macbook-pro-13.jpg'),
('Pin MacBook Air 13"', 25, 50, 1990000, 'Dung lượng: 50Wh, Tương thích: MacBook Air 13" 2017-2020, Chính hãng Apple', 'pin-macbook-air-13.jpg');

-- Sản phẩm thuộc danh mục "Pin Laptop Asus"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Pin Asus X507', 23, 70, 890000, 'Dung lượng: 33Wh, Tương thích: Asus X507, Sạc nhanh', 'pin-asus-x507.jpg'),
('Pin Asus VivoBook 14"', 23, 40, 1190000, 'Dung lượng: 42Wh, Tương thích: VivoBook 14", Hiệu suất tốt', 'pin-asus-vivobook-14.jpg');

-- Sản phẩm thuộc danh mục "Pin Laptop Lenovo"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Pin Lenovo ThinkPad T490', 24, 35, 1590000, 'Dung lượng: 48Wh, Tương thích: ThinkPad T490, Chính hãng Lenovo', 'pin-thinkpad-t490.jpg'),
('Pin Lenovo IdeaPad 3', 24, 50, 990000, 'Dung lượng: 35Wh, Tương thích: IdeaPad 3, Giá hợp lý', 'pin-lenovo-ideapad-3.jpg');

-- Sản phẩm thuộc danh mục "Sạc Laptop Apple"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Sạc MacBook 30W USB-C', 30, 60, 1290000, 'Công suất: 30W, Tương thích: MacBook Air, Cổng: USB-C', 'sac-macbook-30w.jpg'),
('Sạc MacBook 61W USB-C', 30, 40, 1790000, 'Công suất: 61W, Tương thích: MacBook Pro 13", Cổng: USB-C', 'sac-macbook-61w.jpg');

-- Sản phẩm thuộc danh mục "Sạc Laptop Asus"
INSERT INTO SanPham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh) VALUES
('Sạc Asus 65W', 28, 70, 890000, 'Công suất: 65W, Tương thích: Asus VivoBook, Hiệu suất cao', 'sac-asus-65w.jpg'),
('Sạc Asus 90W', 28, 50, 1290000, 'Công suất: 90W, Tương thích: Asus ZenBook, Chính hãng Asus', 'sac-asus-90w.jpg');
