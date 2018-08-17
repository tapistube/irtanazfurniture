/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.5.5-10.1.21-MariaDB : Database - db_irtanaz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_irtanaz` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_irtanaz`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id`,`username`,`password`) values (1,'admin','fbceddc26e0c6bfe5476b413af9d1b74bf96d1442a3715e4b76684dd633e50899ffcf870419a29158ca9a43812fa3be10d5f78af9d923e2d29b7824eb75053c05iTJ6bBlhNlwtzMmNcns0Qv9TankSmM7YByH2VJ9SsA=');

/*Table structure for table `tb_bukti_bayar` */

DROP TABLE IF EXISTS `tb_bukti_bayar`;

CREATE TABLE `tb_bukti_bayar` (
  `id_gambar` varchar(4) NOT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `status_bayar` varchar(4) DEFAULT NULL,
  `nama_gambar` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_bukti_bayar` */

insert  into `tb_bukti_bayar`(`id_gambar`,`id_faktur`,`status_bayar`,`nama_gambar`,`time`) values ('2652','N56V','1','T9043.jpg','2018-08-16 13:48:44'),('6971','R53V','1','U1678.jpg','2018-08-17 14:39:08');

/*Table structure for table `tb_customer` */

DROP TABLE IF EXISTS `tb_customer`;

CREATE TABLE `tb_customer` (
  `id_customer` varchar(5) NOT NULL,
  `nama_customer` varchar(60) DEFAULT NULL,
  `alamat_customer` varchar(70) DEFAULT NULL,
  `nope` varchar(15) DEFAULT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_customer` */

insert  into `tb_customer`(`id_customer`,`nama_customer`,`alamat_customer`,`nope`,`user_name`,`password`) values ('ED807','kagome','bandarlampung','2937839392','pengolahkedelai@gmail.com','bd9f360525fa5d7b0ba7d07f55fabc90e4f20079e07f32f28d732ba92d5be3986e44ffe68c826e782e253cd0ac1f5d1427247d28180882b0ec0de0098f5cd7aaU50h/Ugxu3cHAgY56LO3ehD6FVxOLYwxKixgLmqZkS0='),('LS687','sasuke','Bandar lampung kota','08972637282','tapisdev@gmail.com','96dacfda201620a693cd77e0de4c2a353fd17942453770f29d476b1c5601d9ef00db51180daeb08368eba38fc6942f5a2c4819baf9dd91b5298d25f258de7232KncAdfpCpHWfoJUVudJf4ryzCaO35bMfFYmCgpiLLBo='),('OZ384','inuyasha','Metro','1973783839','tapiskuy1@gmail.com','629f9ed16820b5c742fef46edbef846451807613e2e5f56f377a68525d98d76e1173650fef40b609ded1718f68ed01746a96149a7dfe2fb4aad5b47705fc1babc0nPTRa4i4UWm5otfD3K/HaWcG2WT5GhR8QD4Zxmkjk=');

/*Table structure for table `tb_detail_pembelian` */

DROP TABLE IF EXISTS `tb_detail_pembelian`;

CREATE TABLE `tb_detail_pembelian` (
  `id_transaksi` varchar(4) NOT NULL,
  `id_produk` varchar(4) DEFAULT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_customer` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_pembelian` */

insert  into `tb_detail_pembelian`(`id_transaksi`,`id_produk`,`id_faktur`,`tanggal_pembelian`,`id_customer`) values ('AZ69','YM24','G82O','2018-08-04 11:39:26','OZ384'),('BG27','LK22','Y98W','2018-08-14 17:57:41','OZ384'),('BO42','LK22','G82O','2018-08-04 11:39:27','OZ384'),('CS95','LD52','N56V','2018-08-14 16:14:31','LS687'),('DC83','LD52','G82O','2018-08-04 11:39:30','OZ384'),('FV23','LD52','J82K','2018-08-14 16:05:51','OZ384'),('GK11','LK22','N56V','2018-08-14 16:14:31','LS687'),('MX21','YM24','R53V','2018-08-04 11:56:52','ED807'),('PD25','LK22','C17M','2018-08-14 11:51:20','OZ384'),('RA16','YM24','D19V','2018-08-14 16:02:14','OZ384'),('VZ83','LK22','J82K','2018-08-14 16:05:51','OZ384');

/*Table structure for table `tb_gambar` */

DROP TABLE IF EXISTS `tb_gambar`;

CREATE TABLE `tb_gambar` (
  `id_gambar` varchar(4) NOT NULL,
  `id_produk` varchar(4) DEFAULT NULL,
  `nama_gambar` varchar(50) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `FK_tb_gambar` (`id_produk`),
  CONSTRAINT `FK_tb_gambar` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gambar` */

insert  into `tb_gambar`(`id_gambar`,`id_produk`,`nama_gambar`,`token`) values ('1665','YM24','O3389.jpg','0.285531561896362'),('2466','YU88','T8561.jpg','0.4125920277249766'),('3051','LK22','H1839.jpg','0.3877700432886795'),('5582','YM24','V1373.jpg','0.07069993847997047'),('6362','LD52','A8051.jpg','0.5348306330281972'),('7141','LK22','A9372.jpg','0.10906481482461794'),('8856','LD52','Z3395.jpg','0.8844599101281022'),('9845','YU88','O4367.jpg','0.7881188301477361');

/*Table structure for table `tb_keranjang` */

DROP TABLE IF EXISTS `tb_keranjang`;

CREATE TABLE `tb_keranjang` (
  `id_keranjang` varchar(4) NOT NULL,
  `id_produk` varchar(4) DEFAULT NULL,
  `id_customer` varchar(5) DEFAULT NULL,
  `waktu_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keranjang`),
  KEY `FK_tb_keranjang` (`id_customer`),
  KEY `FK_tb_keranjang2` (`id_produk`),
  CONSTRAINT `FK_tb_keranjang` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`),
  CONSTRAINT `FK_tb_keranjang2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_keranjang` */

/*Table structure for table `tb_penjualan` */

DROP TABLE IF EXISTS `tb_penjualan`;

CREATE TABLE `tb_penjualan` (
  `id_penjualan` varchar(4) NOT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `id_customer` varchar(5) DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penjualan` */

insert  into `tb_penjualan`(`id_penjualan`,`id_faktur`,`id_customer`,`nama_customer`,`tanggal_pembelian`) values ('E54V','N56V','LS687','sasuke','2018-08-16 16:33:41');

/*Table structure for table `tb_pesanan` */

DROP TABLE IF EXISTS `tb_pesanan`;

CREATE TABLE `tb_pesanan` (
  `id_faktur` varchar(4) NOT NULL,
  `id_customer` varchar(5) DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_bayar` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pesanan` */

insert  into `tb_pesanan`(`id_faktur`,`id_customer`,`nama_customer`,`tanggal_pembelian`,`status_bayar`) values ('C17M','OZ384','inuyasha','2018-08-14 11:51:20','0'),('D19V','OZ384','inuyasha','2018-08-14 16:02:14','0'),('G82O','OZ384','inuyasha','2018-08-14 11:48:18','0'),('J82K','OZ384','inuyasha','2018-08-14 16:05:51','0'),('N56V','LS587','sasuke','2018-08-16 16:39:23','2'),('R53V','ED807','kagome','2018-08-17 14:39:43','1'),('Y98W','OZ384','inuyasha','2018-08-14 17:57:41','0');

/*Table structure for table `tb_produk` */

DROP TABLE IF EXISTS `tb_produk`;

CREATE TABLE `tb_produk` (
  `id_produk` varchar(4) NOT NULL,
  `nama_produk` varchar(60) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_produk` */

insert  into `tb_produk`(`id_produk`,`nama_produk`,`kategori`,`stok`,`harga`,`deskripsi`) values ('LD52','Tempat Tidur Jati Minimalis','Tempat Tidur',6,2000000,'Tempat tidur kuat dan nyaman untuk menunjang tidur berkualitas\r\n'),('LK22','Bufet Minimalis','Bufet',18,700000,'Bufet dengan desain modern cocok untuk setiap kesempatan\r\n'),('YM24','Lemari Anak Modern','Lemari',15,500000,'Lemari suitable dengan berbagai jenis ruangan'),('YU88','Set Meja Makan Keluarga','MejaKursi',0,300000,'Kursi simpel dengan berbagai fungsi untuk keluarga anda');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
