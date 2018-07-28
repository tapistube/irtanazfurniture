<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 31/03/2018
 * Time: 8:00
 */
class Login extends CI_Controller
{

    var $gallerypath;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('session','encryption'));
        $this->load->model('Model_User');
    }

    function index(){
        $this->load->view('header2');
        $this->load->view('login_pelanggan');
        $this->load->view('footer');
    }

    function signInAdmin(){
        $id = $this->input->post("txt_id");
        $pass = $this->input->post("txt_pass");

        $cek = $this->db->get_where('tb_admin',array('username'=>$id))->num_rows();
        $result = $this->db->get_where('tb_admin',array('username'=>$id))->result();

        if ($cek != 0){
            $pass_didb = $this->encryption->decrypt($result[0]->password);

            if ($pass_didb == $pass){
                $data_session = array(
                    'id'=>$result[0]->id,
                    'nama'=>$result[0]->username,
                    'bagian'=>"admin"
                );
                $this->session->set_userdata('admin',$data_session);
                redirect('Admin');
            }else{
                redirect('Login/gagalAdmin');
            }

        }else{
            redirect('Login/gagalAdmin');
        }

    }

    function signInPelanggan(){

        $username = $this->input->post('txt_username');
        $password = $this->input->post('txt_password');

        $cek = $this->db->get_where('tb_customer',array('user_name'=>$username))->num_rows();
        $result = $this->db->get_where('tb_customer',array('user_name'=>$username))->result();

        if ($cek != 0){
            $pass_didb = $this->encryption->decrypt($result[0]->password);

            if ($pass_didb == $password){
                $sess_array = array (
                    'id_customer'   =>$result[0]->id_customer ,
                    'nama_customer' => $result[0]->nama_customer,

                );
                $this->session->set_userdata('customer',$sess_array);
                redirect("Utama/listProduk");
            }else{
                redirect('Login/gagalPelanggan');
            }
        }else{
            redirect('Login/gagalPelanggan');
        }

    }

    function gagalPelanggan(){
        $this->load->view("header2");
        $this->load->view("gagal_login_pelanggan");
        $this->load->view("footer");
    }

    function gagalAdmin(){
        $this->load->view("header2");
        $this->load->view("admin/gagal_login_admin");
        $this->load->view("footer");
    }

    function logout(){
        $this->session->unset_userdata('admin');
        redirect('Utama');
    }



}