/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.16 : Database - db_jual_sapi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_jual_sapi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_jual_sapi`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(4) NOT NULL,
  `nama_admin` varchar(60) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id_customer` varchar(4) NOT NULL,
  `nama_customer` varchar(60) DEFAULT NULL,
  `alamat_customer` varchar(60) DEFAULT NULL,
  `nope` varchar(15) DEFAULT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  UNIQUE KEY `Email_Harus_Unik` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`id_customer`,`nama_customer`,`alamat_customer`,`nope`,`user_name`,`password`) values ('IV52','Aemail','Jl Anggrek VI Dusun VI Jepang','098998988787','aemail470@gmail.com','rrtE/mx04JAv3ix/RMov6xyYcSJxGaEe0UTmfSQDNFIKRcavfZR9LW+1GD+F3IJT9UTdkGChVNsAL7pdtYNqhw=='),('JI90','customer Tes','Tes','098998988787','arifglory46@gmail.com','M1w486l/fG/NJToaBlLpdXqFX2gmXJYWhI4lKKI15dChLTX1jF1YjGCT0+8d7i9AaiEQFst/AJQK1yHk3qc7nA==');

/*Table structure for table `tbl_detail_pembelian` */

DROP TABLE IF EXISTS `tbl_detail_pembelian`;

CREATE TABLE `tbl_detail_pembelian` (
  `id_transaksi` varchar(4) NOT NULL,
  `id_sapi` varchar(4) DEFAULT NULL,
  `id_customer` varchar(4) DEFAULT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_pengambilan` date DEFAULT NULL,
  `metode_pembayaran` varchar(2) DEFAULT NULL,
  `status_bayar` varchar(2) DEFAULT NULL,
  `status_pesanan` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_sapi` (`id_sapi`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `tbl_detail_pembelian_ibfk_1` FOREIGN KEY (`id_sapi`) REFERENCES `tbl_estalase` (`id_sapi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_detail_pembelian_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_pembelian` */

insert  into `tbl_detail_pembelian`(`id_transaksi`,`id_sapi`,`id_customer`,`id_faktur`,`tanggal_pembelian`,`tanggal_pengambilan`,`metode_pembayaran`,`status_bayar`,`status_pesanan`) values ('DG73','77','JI90','L65I','2018-04-21 07:04:12','2018-09-01','1','1','0'),('GE17','66','JI90','P63Y','2018-04-20 09:13:10','2018-06-02','1','0','0'),('GN89','80','JI90','P63Y','2018-04-20 09:13:10','2018-06-02','1','0','0'),('YD13','43','JI90','L65I','2018-04-24 18:25:48','2018-09-01','1','1','0'),('ZS15','40','IV52','N86C','2018-04-21 07:58:36','2018-06-23','0','1','0');

/*Table structure for table `tbl_estalase` */

DROP TABLE IF EXISTS `tbl_estalase`;

CREATE TABLE `tbl_estalase` (
  `id_sapi` varchar(4) NOT NULL,
  `jenis_sapi` varchar(60) DEFAULT NULL,
  `berat_kotor` int(11) DEFAULT NULL,
  `berat_bersih` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_sapi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_estalase` */

insert  into `tbl_estalase`(`id_sapi`,`jenis_sapi`,`berat_kotor`,`berat_bersih`,`harga`,`status`) values ('11','Sapi Simental / Limosin',500,900,20000000,'1'),('40','Sapi Madura',600,900,40000000,'0'),('43','Sapi PO',500,1000,80000000,'0'),('66','Sapi Bali',400,500,50000000,'0'),('77','Sapi Madura',300,600,10000000,'0'),('80','Sapi PO',900,1000,60000000,'0');

/*Table structure for table `tbl_gambar` */

DROP TABLE IF EXISTS `tbl_gambar`;

CREATE TABLE `tbl_gambar` (
  `id_gambar` varchar(4) NOT NULL,
  `id_sapi` varchar(4) DEFAULT NULL,
  `nama_gambar` varchar(50) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `id_sapi` (`id_sapi`),
  CONSTRAINT `tbl_gambar_ibfk_1` FOREIGN KEY (`id_sapi`) REFERENCES `tbl_estalase` (`id_sapi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gambar` */

insert  into `tbl_gambar`(`id_gambar`,`id_sapi`,`nama_gambar`,`token`) values ('1273','40','Q6999.jpg','0.8770552636984622'),('1631','11','F5033.jpg','0.0717477598244246'),('1778','77','C8393.png','0.8145197321553053'),('2168','40','Z1274.jpg','0.03477886605242342'),('3564','43','I2631.jpg','0.8217919312434326'),('3775','11','X8260.jpg','0.19389736197002672'),('3830','80','U5680.png','0.29409764843049224'),('4757','66','A9293.jpg','0.08891116162368662'),('4880','43','U1745.jpg','0.02313313551709062'),('5438','66','S5861.jpg','0.7625227111815834'),('5553','43','F3142.jpg','0.7242004152892585'),('6874','77','V9973.png','0.232423702184977'),('7885','77','N1769.png','0.21760009085217846'),('7940','80','J9875.png','0.20551464262259544'),('7947','80','V5534.png','0.2985797787665736'),('7986','11','D7130.jpg','0.23166315122767311'),('9782','66','A9112.jpg','0.8013125002496201'),('9853','40','N9756.jpg','0.6052194930382842');

/*Table structure for table `tbl_keranjang` */

DROP TABLE IF EXISTS `tbl_keranjang`;

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` varchar(4) NOT NULL,
  `id_sapi` varchar(4) DEFAULT NULL,
  `id_customer` varchar(4) DEFAULT NULL,
  `waktu_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keranjang`),
  KEY `id_sapi` (`id_sapi`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `tbl_keranjang_ibfk_1` FOREIGN KEY (`id_sapi`) REFERENCES `tbl_estalase` (`id_sapi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_keranjang_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_keranjang` */

/*Table structure for table `tbl_penjualan` */

DROP TABLE IF EXISTS `tbl_penjualan`;

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` varchar(4) NOT NULL,
  `id_sapi` varchar(4) DEFAULT NULL,
  `id_customer` varchar(4) DEFAULT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `tanggal_pengambilan` date DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `id_sapi` (`id_sapi`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `tbl_penjualan_ibfk_1` FOREIGN KEY (`id_sapi`) REFERENCES `tbl_estalase` (`id_sapi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_penjualan_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_penjualan` */

/*Table structure for table `tbl_riwayat` */

DROP TABLE IF EXISTS `tbl_riwayat`;

CREATE TABLE `tbl_riwayat` (
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(40) DEFAULT NULL,
  `id_admin` varchar(4) DEFAULT NULL,
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `tbl_riwayat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_riwayat` */

/*Table structure for table `tbl_tem` */

DROP TABLE IF EXISTS `tbl_tem`;

CREATE TABLE `tbl_tem` (
  `id_temp` varchar(4) NOT NULL,
  `id_sapi` varchar(4) DEFAULT NULL,
  `id_customer` varchar(4) DEFAULT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_pengambilan` date DEFAULT NULL,
  `metode_pembayaran` varchar(2) DEFAULT NULL,
  `status_bayar` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_temp`),
  KEY `id_customer` (`id_customer`),
  KEY `id_sapi` (`id_sapi`),
  CONSTRAINT `tbl_tem_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_tem_ibfk_2` FOREIGN KEY (`id_sapi`) REFERENCES `tbl_estalase` (`id_sapi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tem` */

insert  into `tbl_tem`(`id_temp`,`id_sapi`,`id_customer`,`id_faktur`,`tanggal_pembelian`,`tanggal_pengambilan`,`metode_pembayaran`,`status_bayar`) values ('DG73','77','JI90','L65I','2018-04-21 07:04:12','2018-09-01','1','1'),('GE17','66','JI90','P63Y','2018-04-20 09:13:10','2018-06-02','1','0'),('GN89','80','JI90','P63Y','2018-04-20 09:13:10','2018-06-02','1','0'),('YD13','43','JI90','L65I','2018-04-24 18:25:55','2018-09-01','1','1'),('ZS15','40','IV52','N86C','2018-04-21 07:58:36','2018-06-23','0','1');

/*Table structure for table `tbl_waiting_list` */

DROP TABLE IF EXISTS `tbl_waiting_list`;

CREATE TABLE `tbl_waiting_list` (
  `id_wait` varchar(4) NOT NULL,
  `id_sapi` varchar(4) DEFAULT NULL,
  `id_customer` varchar(4) DEFAULT NULL,
  `id_faktur` varchar(4) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `tanggal_pengambilan` date DEFAULT NULL,
  PRIMARY KEY (`id_wait`),
  KEY `id_sapi` (`id_sapi`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `tbl_waiting_list_ibfk_1` FOREIGN KEY (`id_sapi`) REFERENCES `tbl_estalase` (`id_sapi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_waiting_list_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_waiting_list` */

/*Table structure for table `tbl_waktu_lebaran` */

DROP TABLE IF EXISTS `tbl_waktu_lebaran`;

CREATE TABLE `tbl_waktu_lebaran` (
  `id_waktu` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_waktu_lebaran` */

insert  into `tbl_waktu_lebaran`(`id_waktu`,`waktu`) values (1,'2018-03-12 06:46:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
