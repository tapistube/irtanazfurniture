<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Masuk_Pelanggan extends CI_Controller {

	public function index()
	{
		
	}
    //L557213PPRN
    public function Masuk_Cek()
	{
		if($this->input->post('txt_username') != '' && $this->input->post('txt_password') != '')
		{
        $username = $this->input->post('txt_username');
        $password = $this->input->post('txt_password');
        $this->load->model('Model_User');
        $result = $this->Model_User->get_user($username);
        
        foreach ($result as $a){
        echo $this->encrypt->decode($a->password);
        if($username == $a->user_name && $password == $this->encrypt->decode($a->password)){
             $sess_array = array (
                'id_customer'   =>$a->id_customer ,
                'nama_customer' => $a->nama_customer,
                 
            );
        $this->session->set_userdata('customer',$sess_array);
        redirect(''); 
	   }
        else{
//            redirect(''); 
        }
            }
        }
    }
    
    public function keluar()
    {
        $this->session->unset_userdata('customer');
        redirect(''); 
        
    }
}
