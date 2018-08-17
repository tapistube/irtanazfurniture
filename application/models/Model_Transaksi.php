<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Transaksi extends CI_Model{

    var $table = 'tb_keranjang';
    
    function list_user(){
        $data = $this->db->get('tbl_keranjang');
        return $data;
    }
    function user_detail($id_customer){
        return $this->db->get_where('tbl_keranjang',array('id_customer'=>$id_customer))->row();
    } 
   
   public function get_user($user_name)
	{
		$this->db->from($this->table);
		$this->db->where('user_name',$user_name);
		$query = $this->db->get();

		return $query->result();
	}
    
//    SELECT
//    `tbl_keranjang`.`id_customer`
//    , `tbl_customer`.`nama_customer`
//    , `tbl_keranjang`.`id_sapi`
//    , `tbl_estalase`.`jenis_sapi`
//    , `tbl_estalase`.`harga`
//    , `tbl_keranjang`.`waktu_beli`
// FROM
//    `db_jual_sapi`.`tbl_keranjang`
//    INNER JOIN `db_jual_sapi`.`tbl_estalase` 
//        ON (`tbl_keranjang`.`id_sapi` = `tbl_estalase`.`id_sapi`)
//    INNER JOIN `db_jual_sapi`.`tbl_customer` 
//        ON (`tbl_keranjang`.`id_customer` = `tbl_customer`.`id_customer`);
    
     public function get_keranjang($id_customer)
	{
//		$this->db->from($this->table);
//		$this->db->where($fild,$id_customer);
//		$query = $this->db->get();
        $query = $this->db->query('SELECT tb_keranjang.id_keranjang,tb_keranjang.id_customer, tb_customer.nama_customer, tb_keranjang.id_produk, tb_produk.kategori,tb_produk.nama_produk,tb_produk.harga,tb_keranjang.waktu_beli FROM db_irtanaz.tb_keranjang  INNER JOIN db_irtanaz.tb_produk ON (tb_keranjang.id_produk = tb_produk.id_produk) INNER JOIN db_irtanaz.tb_customer 
        ON (tb_keranjang.id_customer = tb_customer.id_customer) where tb_keranjang.id_customer = '."'".$id_customer."'");
		return $query;
	}

	 public function get_one_data($id_keranjang)
	{
//		$this->db->from($this->table);
//		$this->db->where($fild,$id_customer);
//		$query = $this->db->get();
        $query = $this->db->query('SELECT tbl_keranjang.id_keranjang,tbl_keranjang.id_customer, tbl_customer.nama_customer, tbl_keranjang.id_sapi, tbl_estalase.jenis_sapi,tbl_estalase.harga,tbl_keranjang.waktu_beli FROM db_jual_sapi.tbl_keranjang  INNER JOIN db_jual_sapi.tbl_estalase ON (tbl_keranjang.id_sapi = tbl_estalase.id_sapi) INNER JOIN db_jual_sapi.tbl_customer 
        ON (tbl_keranjang.id_customer = tbl_customer.id_customer) where tbl_keranjang.id_keranjang = '."'".$id_keranjang."'");
		return $query;
	}
    
//     SELECT
//    `tbl_keranjang`.`id_customer`
//    , `tbl_keranjang`.`id_sapi`
//    , `tbl_gambar`.`nama_gambar`
// FROM
//    `db_jual_sapi`.`tbl_gambar`
//    INNER JOIN `db_jual_sapi`.`tbl_estalase` 
//        ON (`tbl_gambar`.`id_sapi` = `tbl_estalase`.`id_sapi`)
//    INNER JOIN `db_jual_sapi`.`tbl_keranjang` 
//        ON (`tbl_keranjang`.`id_sapi` = `tbl_estalase`.`id_sapi`) GROUP BY id_sapi
    
    public function get_gambar($fild,$id_customer){
        $query = $this->db->query('SELECT tb_keranjang.id_customer, tb_keranjang.id_produk, tb_gambar.nama_gambar FROM db_irtanaz.tb_gambar INNER JOIN  db_irtanaz.tb_produk ON (tb_gambar.id_produk = tb_produk.id_produk) INNER JOIN db_irtanaz.tb_keranjang ON (tb_keranjang.id_produk = tb_produk.id_produk) where tb_keranjang.id_customer = '."'".$id_customer."'".'GROUP BY id_produk');
        return $query;
    }
    
    
    public function save($data)
	{
		$this->db->insert($this->table, $data);
		return true;
	}

	public function simpanDataPesanan($data)
	{
		$this->db->insert('tb_pesanan', $data);
		return true;
	}
	public function simpanDetailBeli($data)
	{
		$this->db->insert('tb_detail_pembelian', $data);
		return true;
	}
    
    public function delete_by_kode($id)
	{
		$this->db->where('id_keranjang', $id);
		$this->db->delete($this->table);
		return true;
	}

	public function delete_by_user($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete($this->table);
		return true;
	}
    
    public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}


}