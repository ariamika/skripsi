  /*
  SQLyog Ultimate v12.4.1 (64 bit)
  MySQL - 10.4.11-MariaDB : Database - yadabagasket
  *********************************************************************
  */

  /*!40101 SET NAMES utf8 */;

  /*!40101 SET SQL_MODE=''*/;

  /*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
  /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
  /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
  /*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
  CREATE DATABASE /*!32312 IF NOT EXISTS*/`yadabagasket` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

  USE `yadabagasket`;

  /*Table structure for table `cart` */

  DROP TABLE IF EXISTS `cart`;

  CREATE TABLE `cart` (
    `idcart` int(11) NOT NULL AUTO_INCREMENT,
    `orderid` varchar(100) NOT NULL,
    `userid` int(11) NOT NULL,
    `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
    `status` varchar(10) NOT NULL DEFAULT 'Cart',
    PRIMARY KEY (`idcart`),
    UNIQUE KEY `orderid` (`orderid`),
    KEY `orderid_2` (`orderid`)
  ) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `cart` */

  insert  into `cart`(`idcart`,`orderid`,`userid`,`tglorder`,`status`) values 
  (10,'15wKVT0nej25Y',2,'2020-03-16 19:10:42','Selesai'),
  (12,'15PzF03ejd8W2',1,'2020-05-13 09:40:48','Confirmed'),
  (13,'16bK7earFw94Y',3,'2022-06-28 17:00:18','Cart'),
  (14,'16CKJkZ2nMNMQ',1,'2022-07-07 20:22:06','Cart'),
  (15,'16iyTFP6p8qjA',6,'2022-07-10 15:57:05','Cart');

  /*Table structure for table `detailorder` */

  DROP TABLE IF EXISTS `detailorder`;

  CREATE TABLE `detailorder` (
    `detailid` int(11) NOT NULL AUTO_INCREMENT,
    `orderid` varchar(100) NOT NULL,
    `idproduk` int(11) NOT NULL,
    `qty` int(11) NOT NULL,
    PRIMARY KEY (`detailid`),
    KEY `orderid` (`orderid`),
    KEY `idproduk` (`idproduk`),
    CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `detailorder` */

  insert  into `detailorder`(`detailid`,`orderid`,`idproduk`,`qty`) values 
  (13,'15wKVT0nej25Y',1,100),
  (14,'15PzF03ejd8W2',2,1),
  (24,'16iyTFP6p8qjA',1,2),
  (25,'16CKJkZ2nMNMQ',3,1),
  (26,'16bK7earFw94Y',2,2);

  /*Table structure for table `kategori` */

  DROP TABLE IF EXISTS `kategori`;

  CREATE TABLE `kategori` (
    `idkategori` int(11) NOT NULL AUTO_INCREMENT,
    `namakategori` varchar(20) NOT NULL,
    `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`idkategori`)
  ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `kategori` */

  insert  into `kategori`(`idkategori`,`namakategori`,`tgldibuat`) values 
  (1,'Bunga Tangkai','2019-12-20 14:28:34'),
  (2,'Bunga Papan','2019-12-20 14:34:17'),
  (3,'Bunga Hidup','2020-03-16 19:15:40');

  /*Table structure for table `konfirmasi` */

  DROP TABLE IF EXISTS `konfirmasi`;

  CREATE TABLE `konfirmasi` (
    `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT,
    `orderid` varchar(100) NOT NULL,
    `userid` int(11) NOT NULL,
    `payment` varchar(10) NOT NULL,
    `namarekening` varchar(25) NOT NULL,
    `tglbayar` date NOT NULL,
    `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`idkonfirmasi`),
    KEY `userid` (`userid`),
    CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `konfirmasi` */

  /*Table structure for table `login` */

  DROP TABLE IF EXISTS `login`;

  CREATE TABLE `login` (
    `userid` int(11) NOT NULL AUTO_INCREMENT,
    `namalengkap` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(150) NOT NULL,
    `notelp` varchar(15) NOT NULL,
    `provinsi` int(11) NOT NULL,
    `kota` int(11) DEFAULT NULL,
    `alamat` varchar(100) NOT NULL,
    `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
    `role` varchar(7) NOT NULL DEFAULT 'Member',
    `lastlogin` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`userid`)
  ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `login` */

  insert  into `login`(`userid`,`namalengkap`,`email`,`password`,`notelp`,`provinsi`,`kota`,`alamat`,`tgljoin`,`role`,`lastlogin`) values 
  (1,'raffi ahmad','raffiahmad@ymail.com','$2y$10$XKPTsTYuwyJhPOLzVFN5Gu1e5Rm3RIOsP9bAnWt9ldqVwhKh7r9JK','085567532147',2,NULL,'Indonesia','2022-06-27 18:42:45','Admin',NULL),
  (2,'nagita','nagita@ymail.com','$2y$10$Kq1LJrvxnSSlbqmzS4fxDeTnvjFHRE2hIz9xNgYKbUl7k0mckVH32','0812777888',1,NULL,'Indonesia','2022-06-28 17:10:16','Member',NULL),
  (6,'arya','aryabagas0404@gmail.com','$2y$10$38t9TuaCxcYSMMHwMuio6.LQKnoRKfTU7BCYB3GR5Z6lHVg08B.4K','085695248705',1,NULL,'Pondok Aren Arinda 2','2022-07-10 15:55:48','Member',NULL),
  (7,'CJ','joy@mail.com','$2y$10$eRLzh2j67xg15g5fE4RabuFOgitdyBz/t2IcmikIBEuBLXkXVDBSu','123124421',1,128,'Bali Kuta Slatan 231','2022-07-12 13:26:07','Member',NULL);

  /*Table structure for table `ongkir_jne` */

  DROP TABLE IF EXISTS `ongkir_jne`;

  CREATE TABLE `ongkir_jne` (
    `berat` int(11) NOT NULL,
    `harga` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  /*Data for the table `ongkir_jne` */

  insert  into `ongkir_jne`(`berat`,`harga`) values 
  (1,10000),
  (2,20000),
  (3,30000),
  (4,40000),
  (5,50000);

  /*Table structure for table `pembayaran` */

  DROP TABLE IF EXISTS `pembayaran`;

  CREATE TABLE `pembayaran` (
    `no` int(11) NOT NULL AUTO_INCREMENT,
    `metode` varchar(25) NOT NULL,
    `norek` varchar(25) NOT NULL,
    `logo` text DEFAULT NULL,
    `an` varchar(20) NOT NULL,
    PRIMARY KEY (`no`)
  ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `pembayaran` */

  insert  into `pembayaran`(`no`,`metode`,`norek`,`logo`,`an`) values 
  (1,'Bank BCA','13131231231','images/bca.jpg','Arya B'),
  (2,'Bank Mandiri','943248844843','images/mandiri.jpg','Arya B'),
  (3,'DANA','0882313132123','images/dana.png','Arya B');

  /*Table structure for table `produk` */

  DROP TABLE IF EXISTS `produk`;

  CREATE TABLE `produk` (
    `idproduk` int(11) NOT NULL AUTO_INCREMENT,
    `idkategori` int(11) NOT NULL,
    `namaproduk` varchar(30) NOT NULL,
    `gambar` varchar(100) NOT NULL,
    `deskripsi` varchar(200) NOT NULL,
    `rate` int(11) NOT NULL,
    `hargabefore` int(11) NOT NULL,
    `hargaafter` int(11) NOT NULL,
    `berat_produk` int(255) NOT NULL,
    `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`idproduk`),
    KEY `idkategori` (`idkategori`),
    CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

  /*Data for the table `produk` */

  insert  into `produk`(`idproduk`,`idkategori`,`namaproduk`,`gambar`,`deskripsi`,`rate`,`hargabefore`,`hargaafter`,`berat_produk`,`tgldibuat`) values 
  (1,1,'Mawar Merah','produk/7443a12318c5f4f29059d243fd14f447.png','Setangkai mawar merah',5,23000,19000,2,'2019-12-20 16:10:26'),
  (2,1,'Mawar Putih','produk/15kwuDMbYtraw.png','Setangkai mawar putih',4,24000,19500,1,'2019-12-20 16:24:13'),
  (3,3,'Bunga Hidup','produk/15Ak7lFMfvuJc.jpg','Bunga Hidup',5,25000,15000,1,'2020-03-16 19:16:53');

  /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
  /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
  /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
  /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
