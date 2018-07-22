<?php
class Model_Transaksi extends CI_Model{

    var $table = 'tbl_keranjang';
    
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
        $query = $this->db->query('SELECT tbl_keranjang.id_keranjang,tbl_keranjang.id_customer, tbl_customer.nama_customer, tbl_keranjang.id_sapi, tbl_estalase.jenis_sapi,tbl_estalase.harga,tbl_keranjang.waktu_beli FROM db_jual_sapi.tbl_keranjang  INNER JOIN db_jual_sapi.tbl_estalase ON (tbl_keranjang.id_sapi = tbl_estalase.id_sapi) INNER JOIN db_jual_sapi.tbl_customer 
        ON (tbl_keranjang.id_customer = tbl_customer.id_customer) where tbl_keranjang.id_customer = '."'".$id_customer."'");
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
        $query = $this->db->query('SELECT tbl_keranjang.id_customer, tbl_keranjang.id_sapi, tbl_gambar.nama_gambar FROM db_jual_sapi.tbl_gambar INNER JOIN  db_jual_sapi.tbl_estalase ON (tbl_gambar.id_sapi = tbl_estalase.id_sapi) INNER JOIN db_jual_sapi.tbl_keranjang ON (tbl_keranjang.id_sapi = tbl_estalase.id_sapi) where tbl_keranjang.id_customer = '."'".$id_customer."'".'GROUP BY id_sapi');
        return $query;
    }
    
    
    public function save($data)
	{
		$this->db->insert($this->table, $data);
		return true;
	}

	public function save_ok_temp($data)
	{
		$this->db->insert('tbl_tem', $data);
		return true;
	}
	public function save_ok_user($data)
	{
		$this->db->insert('tbl_detail_pembelian', $data);
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