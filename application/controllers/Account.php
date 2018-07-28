<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 24/07/2018
 * Time: 17:14
 */
class Account extends CI_Controller
{

    public function index(){
        echo 'account';
    }

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session','encryption'));
        $this->load->model('Model_User');
    }

    public function simpanAkun(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_nama','Nama','required');
        $this->form_validation->set_rules('txt_email','Email','required');
        $this->form_validation->set_rules('txt_password','Password','required');
        $this->form_validation->set_rules('txt_konfir_psw','Konfirmasi Password','required');
        $this->form_validation->set_rules('txt_nope','No. Telepon','required');
        $this->form_validation->set_rules('txt_alamat','Alamat','required');


        if ($this->form_validation->run() != false) {

            $password1 = $this->input->post('txt_password');
            $password2 = $this->input->post('txt_konfir_psw');

            if ($password1 == $password2) {

                $enkripsi = $this->encryption->encrypt($password1);
                $dataUser = array(
                    'id_customer' => chr(rand(65,90)).chr(rand(65,90)).rand(10,100).rand(10,100),
                    'nama_customer' => $this->input->post('txt_nama'),
                    'nope' => $this->input->post('txt_nope'),
                    'alamat_customer' => $this->input->post('txt_alamat'),
                    'user_name' => $this->input->post('txt_email'),
                    'password' =>$enkripsi,
                );

                $this->session->set_flashdata('success','Berhasil daftar akun !');
                echo "Berhasil daftar";
                $this->session->unset_userdata('errorMsg');

                $this->db->insert('tb_customer',$dataUser);

                redirect('Utama/berhasilDaftar');

            }else {
                $this->session->set_flashdata('error','Konfirmasi Password tidak valid !');
                $sessionErorPasswordMsg = array(
                    'errorMsg' => "Konfirmasi Password Tidak Valid !"
                );
                $this->session->set_userdata('errorMsg',$sessionErorPasswordMsg);

                $this->load->view('header2');
                $this->load->view('register_user');
                $this->load->view('footer');
            }
        }else{
            $this->session->set_flashdata('error','Ada data yang kurang !');
            $sessionErorPasswordMsg = array(
                'errorMsg' => "Ada data yang belum diisi !"
            );
            $this->session->set_userdata('errorMsg',$sessionErorPasswordMsg);

            $this->load->view('header2');
            $this->load->view('register_user');
            $this->load->view('footer');
        }


    }

}