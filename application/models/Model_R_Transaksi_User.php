<?php
class Model_R_Transaksi_User extends CI_Model{

    var $table = 'tbl_detail_pembelian';

    public function get_by_kode($id_faktur)
	{
	$query = $this->db->query('SELECT tbl_detail_pembelian.id_transaksi
    , tbl_detail_pembelian.id_faktur
    , tbl_detail_pembelian.id_customer
    , tbl_customer.nama_customer
    , tbl_customer.alamat_customer
    , tbl_customer.nope
    , tbl_customer.user_name
    , tbl_detail_pembelian.id_sapi
    , tbl_estalase.jenis_sapi
    , tbl_estalase.berat_kotor
    , tbl_estalase.berat_bersih
    , tbl_estalase.harga
    , DATE_FORMAT(tbl_detail_pembelian.tanggal_pembelian,"%d %M %Y") AS tanggal_pembelian
    , DATE_FORMAT(tbl_detail_pembelian.tanggal_pengambilan,"%d %M %Y") AS tanggal_pengambilan
    , tbl_detail_pembelian.metode_pembayaran
    , tbl_detail_pembelian.status_bayar
    , tbl_detail_pembelian.status_pesanan
	FROM
    db_jual_sapi.tbl_detail_pembelian
    INNER JOIN db_jual_sapi.tbl_estalase 
        ON (tbl_detail_pembelian.id_sapi = tbl_estalase.id_sapi)
    INNER JOIN db_jual_sapi.tbl_customer 
        ON (tbl_detail_pembelian.id_customer = tbl_customer.id_customer)
        	where tbl_detail_pembelian.id_faktur = '."'".$id_faktur."'");
		
		return $query;
	}
    public function get_by_id($id_customer)
    {
    $query = $this->db->query('SELECT tbl_detail_pembelian.id_transaksi
    , tbl_detail_pembelian.id_faktur
    , tbl_detail_pembelian.id_customer
    , tbl_customer.nama_customer
    , tbl_customer.alamat_customer
    , tbl_customer.nope
    , tbl_customer.user_name
    , tbl_detail_pembelian.id_sapi
    , tbl_estalase.jenis_sapi
    , tbl_estalase.berat_kotor
    , tbl_estalase.berat_bersih
    , tbl_estalase.harga
    , tbl_detail_pembelian.tanggal_pembelian
    , tbl_detail_pembelian.tanggal_pengambilan
    , tbl_detail_pembelian.metode_pembayaran
    , tbl_detail_pembelian.status_bayar
    , tbl_detail_pembelian.status_pesanan
    FROM
    db_jual_sapi.tbl_detail_pembelian
    INNER JOIN db_jual_sapi.tbl_estalase 
        ON (tbl_detail_pembelian.id_sapi = tbl_estalase.id_sapi)
    INNER JOIN db_jual_sapi.tbl_customer 
        ON (tbl_detail_pembelian.id_customer = tbl_customer.id_customer)
            where tbl_detail_pembelian.id_customer = '."'".$id_customer."'");
        
        return $query;
    }

    public function get_by_group($id_customer)
    {
    $query = $this->db->query('SELECT tbl_detail_pembelian.id_faktur AS kode_faktur, tbl_detail_pembelian.id_customer, DATE_FORMAT(tbl_detail_pembelian.tanggal_pembelian,"%d %M %Y") AS tanggal,
        (SELECT SUM(tbl_estalase.harga)  
        FROM
            db_jual_sapi.tbl_detail_pembelian
            INNER JOIN db_jual_sapi.tbl_estalase 
                ON (tbl_detail_pembelian.id_sapi = tbl_estalase.id_sapi) WHERE tbl_detail_pembelian.id_faktur = kode_faktur ) AS total
FROM
    db_jual_sapi.tbl_detail_pembelian
    INNER JOIN db_jual_sapi.tbl_estalase 
        ON (tbl_detail_pembelian.id_sapi = tbl_estalase.id_sapi) WHERE tbl_detail_pembelian.id_customer = '."'".$id_customer."'".' GROUP BY tbl_detail_pembelian.id_faktur');
        
        return $query;
    }

}