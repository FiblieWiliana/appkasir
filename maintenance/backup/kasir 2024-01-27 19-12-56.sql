
-- Database Backup --
-- Ver. : 1.0.1
-- Host : Server Host
-- Generating Time : Jan 27, 2024 at 19:12:56:PM


CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL AUTO_INCREMENT,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO detailpenjualan VALUES
("4","4","2","1","5000.00"),
("5","5","7","1","15000.00"),
("6","5","9","1","45000.00"),
("7","6","8","2","26000.00"),
("8","7","1","2","4000.00"),
("9","7","3","1","15000.00");

CREATE TABLE `keranjang` (
  `KeranjangID` int(10) NOT NULL AUTO_INCREMENT,
  `ProdukID` int(10) NOT NULL,
  `Jumlah` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`KeranjangID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  PRIMARY KEY (`PelangganID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO pelanggan VALUES
("1","Umum","Umum","000000000000"),
("2","Fiblie","Dalung","081339682031"),
("3","nia","tabanan","08128765465"),
("4","diah ","dalung","0865423456765"),
("5","risma","dalung","086542345676"),
("6","jeremy","dunia","9876543456776");

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL AUTO_INCREMENT,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `PelangganID` int(11) NOT NULL,
  PRIMARY KEY (`PenjualanID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO penjualan VALUES
("4","2024-01-18","5000","4"),
("5","2024-01-18","60000","5"),
("6","2024-01-23","52000","6"),
("7","2024-01-26","23000","1");

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL AUTO_INCREMENT,
  `Barcode` varchar(25) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  PRIMARY KEY (`ProdukID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO produk VALUES
("1","8886008101053","Aqua Botol","4000.00","5"),
("2","8992696405417","Dancow","5000.00","20"),
("3","8993200661312","Cimory Anggur","15000.00","10"),
("4","8991002103528 ","Good Day Original","8000.00","25"),
("5","8992304049743","Garnier Skin Naturalis Sakura","25000.00","16"),
("6","8993007000086","Indomilk Coklat","12000.00","25"),
("7","8998866100250","Kodomo Orange","15000.00","30"),
("8","8998667400283","Konicare Minyak Telon","26000.00","35"),
("9","8992304010224"," L’OREAL Shampoo","45000.00","20"),
("10","8996001600221","Kopiko Coffe Latte","16000.00","37"),
("11","8991002105409","Kapal Api Kopi Bubuk","25000.00","20"),
("12","8992727003896","Biore Body Foam","28000.00","30"),
("13","8991111101316"," Johnsons Baby Oil","22000.00","35"),
("14","89686010015 ","Indomie Ayam Bawang","3000.00","50"),
("15","8998989300087","Gudang Garam","26000.00","20"),
("16","749921006868","HILO TEEN CHOCOLATE","35000.00","30"),
("17","8992775212110","Garuda Kacang Telur","7000.00","50"),
("18","8999999009281","Molto Yellow","18000.00","40"),
("19","8997021870052","Fresh Care Green Tea","17000.00","50"),
("20","8996001440049","Energen Chocolate ","14000.00","30");

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES
("2","nia","niaprad","nia1234","2"),
("3","fiblie","fiblie","fiblie","1");