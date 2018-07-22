<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sapi extends CI_Controller {

	public function index()
	{
		echo 'Sapi';
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
    
    public function ubah()
	{
		//echo 'Sapi simpan';
        $id = $this->input ->post('id');
        $this -> load -> model('Model_Sapi');
        $datasapi = array(
            'jenis_sapi' => $this->input ->post('txt_jenis'),
            'berat_kotor' => $this->input ->post('txt_berat_skrg'),
            'berat_bersih' => $this->input ->post('txt_berat_estimasi'),
            'harga' => preg_replace("/[^0-9]/", "", $this->input ->post('txt_harga')),
            
        );
        
        $cek = $this->Model_Sapi->update($id,$datasapi);
        
        if($cek == true){
            redirect('Admin/detailSapi/'.$id);
        }else{
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            redirect('Admin/ubahSapi/'.$id);
        }
        
	}
    
    public function hapus($id)
	{
		//echo 'Sapi hapus';
        $this->load->model('Model_Sapi');
        $gambar = $this->Model_Sapi->get_img_by_kode($id)->result();
        
        foreach ($gambar as $b){
           // cetak($b->nama_gambar);
            $nama_foto=$b->nama_gambar;
			if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto)){
				unlink($file);
			}
            
        }
        $hapus = $this->Model_Sapi->delete_by_kode($id);
        if($hapus == true){
            redirect('Admin/listSapi');
        }else{
            echo "<script type='text/javascript'>alert('Gagal Hapus Data!')</script>";
        }
      
	}
}
