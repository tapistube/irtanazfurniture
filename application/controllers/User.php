<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 23/04/2018
 * Time: 11:17
 */
class User extends CI_Controller
{

    var $gallerypath;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','session','encryption','pagination'));
    }

    function index(){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this -> load -> model('Model_R_Transaksi_User');
        $data['transaksi'] = $this->Model_R_Transaksi_User->get_by_group($user['id_customer'])->result();
        $this->load->view('header2');
        $this->load->view('dashboard_user',$data);        
    }
    $this->load->view('footer');
    }

    function detailPembelian($id_faktur){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this -> load -> model('Model_R_Transaksi_User');    
        $data['list_transaksi'] = $this->Model_R_Transaksi_User->get_by_kode($id_faktur)->result();
        $this->load->view('header2');
        $this->load->view('detail_beli_user',$data);
        $this->load->view('footer');
    }
    }

    function profil(){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this -> load -> model('Model_User');
        $data['dataku'] = $this->Model_User->get_by_kode($user['id_customer'])->result();
        $this->load->view('header2');
        $this->load->view('profil_user',$data);
        $this->load->view('footer');
    }
    }

    function resetPass(){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this->load->view('header2');
        $this->load->view('reset_pass_user');
        $this->load->view('footer');
    }
    }

    function Ubah_PW(){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
            $this -> load -> model('Model_User');
            $data = $this->Model_User->get_by_kode($user['id_customer'])->result();
            $data_kirim['dataku'] = $this->Model_User->get_by_kode($user['id_customer'])->result();
            foreach ($data as $a) {
                if($this->input->post('restore_email') == $a->user_name){
                    echo "<script type='text/javascript'>alert('Email Anda Valid');</script>";
                    $password = chr(rand(65,90)).rand(10,100).rand(100,10000).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90));
                    $data_kirim['password_ubahan'] = $password;
                    $dataubah = array(
                        'password' =>$this->encrypt->encode( $password) );
                    $cek = $this->Model_User->update($user['id_customer'],$dataubah);
                    if($cek == true){
                        //$this->load->view('password_kirim_ubah',$data_kirim);
                        $notif = $this->load->view('password_kirim_ubah',$data_kirim,TRUE);

                        $config['protocol'] = "smtp";
                        $config['smtp_host'] = "ssl://smtp.gmail.com";
                        $config['smtp_port'] = "465";
                        $config['smtp_user'] = "indoprimabeef1@gmail.com";
                        $config['smtp_pass'] = "1nd0pr1m4b33f";
                        $config['charset'] = "utf-8";
                        $config['mailtype'] = "html";
                        $config['newline'] = "\r\n";
                       
                       
                        $this->email->initialize($config);
                       
                        $from_email = "indoprimabeef1@gmail.com"; 
                        $to_email = $a->user_name ;
                      
                        $this->email->from($from_email,"Indoprima Akun"); 
                        $this->email->to($to_email);
                        $this->email->subject('AKUN USER BARU'); 
                        $this->email->message($notif);
                        $this->email->send();
                       redirect('User/profil');
                    }else{
                        echo "<script type='text/javascript'>alert('Gagal Ubah Data');</script>";
                        redirect('User/resetPass');
                    }
                }else{
                    echo "<script type='text/javascript'>alert('Email Anda Tidak Valid');</script>";
                }
            }
        }
    }

}