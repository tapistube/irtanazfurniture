<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 14/08/2018
 * Time: 11:23
 */
class Model_Pesanan extends CI_Model
{
    var $table = "tb_pesanan";

    function listPesanan(){
        $this->db->where('status_bayar != 2');
        $data = $this->db->get($this->table);
        return $data;
    }

    function listPesananPaging($number,$offset){
        $this->db->where('status_bayar != 2');
        $data = $this->db->get($this->table,$number,$offset);
        return $data;
    }

    function getDataPesanan(){
        $query = $this->db->query('SELECT
    tb_pesanan.id_faktur
    , tb_pesanan.id_customer
    , tb_pesanan.tanggal_pembelian
    , tb_pesanan.status_bayar
    , tb_customer.nama_customer
FROM
    db_irtanaz.tb_pesanan
    , db_irtanaz.tb_detail_pembelian
    , db_irtanaz.tb_customer;');

        return $query;
    }

    public function getPesananByKode($id_faktur)
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
        	where tb_detail_pembelian.id_faktur = '."'".$id_faktur."'");

        return $query;
    }
}