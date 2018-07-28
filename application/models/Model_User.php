<?php
class Model_User extends CI_Model{

   var $table = 'tb_customer';
    
    function list_user(){
        $data = $this->db->get(table);
        return $data;
    }
    function user_detail($id_customer){
        return $this->db->get_where($this->table,array('id_customer'=>$id_customer))->row();
    } 
   
   public function get_user($user_name)
	{
		$this->db->from($this->table);
		$this->db->where('user_name',$user_name);
		$query = $this->db->get();

		return $query->result();
	}
    
     public function get_by_kode($id_customer)
	{
		$this->db->from($this->table);
		$this->db->where('id_customer',$id_customer);
		$query = $this->db->get();

		return $query;
	}
    
    
    
    public function save($data)
	{
		$this->db->insert($this->table, $data);
		return true;
	}
    
    public function delete_by_kode($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete($this->table);
		return true;
	}
    
    public function update($where, $data)
	{
		$this->db->where('id_customer',$where);
        $this->db->update($this->table, $data);
		return true;
	}


}