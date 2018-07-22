<?php
class Model_Sapi extends CI_Model{

    var $table = 'tbl_estalase';
    
    function list_sapi(){
        $data = $this->db->get('tbl_estalase');
        return $data;
    }
    
    function list_sapi_paging($number,$offset){
        $data = $this->db->get('tbl_estalase',$number,$offset);
        return $data;
    }
   
    // save data
    public function save($tabelkita,$data)
	{
		$this->db->insert($tabelkita, $data);
		return true;
	}
    public function delete_by_kode($id)
	{
		$this->db->where('id_sapi', $id);
		$this->db->delete($this->table);
        
        return true;
	}
    
    public function update($where, $data)
	{
		$this->db->where('id_sapi',$where);
        $this->db->update($this->table,$data);
		return true;
	}
    
    public function get_by_kode($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_sapi',$id);
		$query = $this->db->get();

		return $query;
	}
    
    public function get_img_by_kode($id)
	{
		$this->db->from('tbl_gambar');
		$this->db->where('id_sapi',$id);
		$query = $this->db->get();

		return $query;
	}
    
    public function get_img_by_id($id)
	{
		$this->db->from('tbl_gambar');
		$this->db->where('id_gambar',$id);
		$query = $this->db->get();

		return $query;
	}
    
    public function get_img_utama_by_id($id)
	{
        $this->db->where('id_sapi',$id);
		$this->db->group_by('id_sapi');
		$query = $this->db->get('tbl_gambar');
		return $query;
	}
    
    public function get_img_utama()
	{
        $this->db->group_by('id_sapi');
		$query = $this->db->get('tbl_gambar');
		return $query;
	}


}