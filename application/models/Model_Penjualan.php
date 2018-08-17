<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 17/08/2018
 * Time: 14:25
 */
class Model_Penjualan extends CI_Model
{
    var $table = "tb_penjualan";

    function listPenjualan(){
        $data = $this->db->get($this->table);
        return $data;
    }

    function listPenjualanPaging($number,$offset){
        $data = $this->db->get($this->table,$number,$offset);
        return $data;
    }

    function getDataPenjualanByTanggal($tgl1,$tgl2){
        $this->db->where('tanggal_pembelian >=', $tgl1);
        $this->db->where('tanggal_pembelian <=', $tgl2);
        $query=$this->db->get($this->table);
        return $query;
    }

    public function reportPenjualan($tgl1,$tgl2)
    {
        $query = $this->db->query('SELECT tb_detail_pembelian.id_transaksi
    , tb_detail_pembelian.id_faktur
    , tb_detail_pembelian.id_customer
    , tb_customer.nama_customer
    , tb_customer.alamat_customer
    , tb_customer.nope
    , tb_customer.user_name
    , tb_detail_pembelian.id_produk
    , tb_produk.kategori
    , tb_produk.harga
    , tb_produk.stok
    , tb_produk.nama_produk
    , DATE_FORMAT(tb_detail_pembelian.tanggal_pembelian,"%d %M %Y") AS tanggal_pembelian
    , tb_pesanan.status_bayar
	FROM
    db_irtanaz.tb_detail_pembelian
    INNER JOIN db_irtanaz.tb_produk 
        ON (tb_detail_pembelian.id_produk = tb_produk.id_produk)
    INNER JOIN db_irtanaz.tb_customer 
        ON (tb_detail_pembelian.id_customer = tb_customer.id_customer)
    INNER JOIN db_irtanaz.tb_pesanan 
        ON (tb_detail_pembelian.id_faktur = tb_pesanan.id_faktur)    
        	where tb_pesanan.status_bayar = '."'2'".'and tb_pesanan.tanggal_pembelian >= '."'$tgl1'".'and tb_pesanan.tanggal_pembelian <= '."'$tgl2.'");

        return $query;
    }
}