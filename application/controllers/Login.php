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

    function gagalAdmin(){
        $this->load->view("header2");
        $this->load->view("gagal_admin");
        $this->load->view("footer");
    }



}