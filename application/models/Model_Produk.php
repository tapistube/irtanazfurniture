<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 23/07/2018
 * Time: 11:45
 */
class Model_Produk extends CI_Model
{
    var $table = 'tb_produk';

    public function getKodeProduk(){
        $id_produk = chr(rand(65,90)).chr(rand(65,90)).rand(10,100).rand(10,100);
        return $id_produk;
    }

    public function simpan()
    {
        //echo 'Sapi simpan';

        $this -> load -> model('Model_Sapi');
        $data['id_sapi'] = $this->input ->post('txt_id');
        $datasapi = array(
            'id_sapi' => $this->input ->post('txt_id'),
            'jenis_sapi' => $this->input ->post('txt_jenis'),
            'berat_kotor' => $this->input ->post('txt_berat_kotor'),
            'berat_bersih' => $this->input ->post('txt_berat_bersih'),
            'harga' => preg_replace("/[^0-9]/", "", $this->input ->post('txt_harga')),
            'status' => "1",
        );

        $ses_id_sapi = array(
            'id_sapi' => $this->input ->post('txt_id')
        );
        $this->session->set_userdata('idsapi',$ses_id_sapi);

        $cek = $this->db->insert('tbl_estalase',$datasapi);

        if($cek == true){
            redirect('Admin/inputGambarSapi');
        }else{
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            $this->load->view('admin/header_admin');
            $this->load->view('admin/sidebar_admin');
            $this->load->view('admin/input_data_sapi');
        }

    }

    function listProduk(){
        $data = $this->db->get('tb_produk');
        return $data;
    }

    function listLemari(){
        $this->db->where('kategori',"Lemari");
        $data = $this->db->get($this->table);
        return $data;
    }

    function listLemariPaging($number,$offset){
        $this->db->where('kategori',"Lemari");
        $data = $this->db->get('tb_produk',$number,$offset);
        return $data;
    }

    function listMejaKursi(){
        $this->db->where('kategori',"MejaKursi");
        $data = $this->db->get($this->table);
        return $data;
    }

    function listMejaKursiPaging($number,$offset){
        $this->db->where('kategori',"MejaKursi");
        $data = $this->db->get('tb_produk',$number,$offset);
        return $data;
    }

    function listBufet(){
        $this->db->where('kategori',"Bufet");
        $data = $this->db->get($this->table);
        return $data;
    }

    function listBufetPaging($number,$offset){
        $this->db->where('kategori',"Bufet");
        $data = $this->db->get('tb_produk',$number,$offset);
        return $data;
    }

    function listTempatTidur(){
        $this->db->where('kategori',"Tempat Tidur");
        $data = $this->db->get($this->table);
        return $data;
    }

    function listTempatTidurPaging($number,$offset){
        $this->db->where('kategori',"Tempat Tidur");
        $data = $this->db->get('tb_produk',$number,$offset);
        return $data;
    }

    public function getImgUtamaLemari()
    {
        $this->db->where('kategori',"Lemari");
        $this->db->group_by('id_produk');
        $query = $this->db->get('tb_gambar');
        return $query;
    }

    function update($id, $data){
        $this->db->where('id_produk',$id);
        $this->db->update($this->table,$data);
        return true;
    }

    public function get_img_utama()
    {
        $this->db->group_by('id_produk');
        $query = $this->db->get('tb_gambar');
        return $query;
    }

    function list_produk_paging($number,$offset){
        $data = $this->db->get('tb_produk',$number,$offset);
        return $data;
    }

    function getProdukById($id){
        $this->db->from($this->table);
        $this->db->where('id_produk',$id);
        $query = $this->db->get();

        return $query;
    }

    public function getImgById($id){
        $this->db->from('tb_gambar');
        $this->db->where('id_produk',$id);
        $query = $this->db->get();

        return $query;
    }

    public function getImgUtamaById($id){
        $this->db->where('id_produk',$id);
        $this->db->group_by('id_produk');
        $query = $this->db->get('tb_gambar');
        return $query;
    }

    function deleteByKode($id){
        $this->db->where('id_produk', $id);
        $this->db->delete($this->table);

        return true;
    }

    function deleteGambar($idPRoduk){
        $this->db->where('id_produk', $idPRoduk);
        $this->db->delete("tb_gambar");

        return true;
    }


}