<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_User extends CI_Controller {

	
	public function index()
	{
		
	}
    
    public function Daftar()
	{
        $password = chr(rand(65,90)).rand(10,100).rand(100,10000).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90));
        $this->load->model('Model_User','Controller_User');
		$data_user = array(
				'id_customer' => chr(rand(65,90)).chr(rand(65,90)).rand(10,100).rand(10,100),
                'nama_customer' => $this->input->post('txt_nama'),
                'nope' => $this->input->post('txt_nope'),
                'alamat_customer' => $this->input->post('txt_alamat'),
                'user_name' => $this->input->post('txt_email'),
				'password' =>$this->encrypt->encode( $password),
				
			);

		$data_user_s = array(
				'id_customer' => chr(rand(65,90)).chr(rand(65,90)).rand(10,100).rand(10,100),
                'nama_customer' => $this->input->post('txt_nama'),
                'nope' => $this->input->post('txt_nope'),
                'alamat_customer' => $this->input->post('txt_alamat'),
                'user_name' => $this->input->post('txt_email'),
				'password' =>$password,
				
			);
        $insert = $this->Controller_User->save($data_user);
        $this->session->set_userdata('daftar',$data_user_s);
		redirect('Utama/berhasilDaftar');
	}

	public function password_kirim()
	{
		$this->load->view('password_kirim');
	}
    
    
}
