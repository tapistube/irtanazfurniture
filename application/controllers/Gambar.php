<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
    
    //Untuk proses upload foto
	function proses_upload(){

        $config['upload_path']   = FCPATH.'/upload-foto/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['file_name']     = chr(rand(65,90)).rand(10,100).rand(10,100);
        
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
            
            $datagambar = array(
            'id_gambar' => rand(10,99).rand(30,90),
            'id_sapi' => $token=$this->input->post('id_sapi'),
            'nama_gambar' => $nama=$this->upload->data('file_name'),
            'token' => $token=$this->input->post('token_foto')
        );        	
        	
        	$this->db->insert('tbl_gambar',$datagambar);
        }


	}
    
     //Untuk proses Edit foto
	function proses_Edit(){
        $id = $this->input ->post('id_gambar');
        $id_sap = $this->input ->post('id_sapi');
        $nama_foto_old = $this->input ->post('nama_gambar_old');
        $config['upload_path']   = FCPATH.'/upload-foto/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['file_name']     = chr(rand(65,90)).rand(10,100).rand(10,100);
        
        $this->load->library('upload',$config);

        if($this->upload->do_upload('img_guide')){
            
            $datagambar = array(
            'nama_gambar' => $nama=$this->upload->data('file_name')
            );        	
        	$this->db->where('id_gambar',$id);
            $this->db->update('tbl_gambar',$datagambar);
        	if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto_old)){
				unlink($file);
			}
            redirect('Admin/detailSapi/'.$id_sap);
        }


	}


	//Untuk menghapus foto
	function remove_foto(){

		//Ambil token foto
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('tbl_gambar',array('token'=>$token));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->nama_gambar;
			if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('tbl_gambar',array('token'=>$token));

		}


		echo "{}";
	}
}
