<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 22/03/2018
 * Time: 10:32
 */
class Utama extends CI_Controller
{
    var $gallerypath;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination'));
    }

    function index(){

        $this->load->view('header2');
        $this->load->view('beranda');
        $this->load->view('footer');
    }

    function tentang(){
        $this->load->view('header2');
        $this->load->view('tentang');
        $this->load->view('footer');
    }

    function listSapi(){
        $this->session->unset_userdata('idsapi');
        $this -> load -> model('Model_Sapi');
//        $data['sapi'] = $this->Model_Sapi->list_sapi()->result();
        $data['gambar'] = $this->Model_Sapi->get_img_utama()->result();
        
        $jumlah_data = $this->Model_Sapi->list_sapi()->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Utama/listSapi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;
        
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';

        
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['sapi'] = $this->Model_Sapi->list_sapi_paging($config['per_page'],$from)->result();
		 
        $this->load->view('header2');
        $this->load->view('list_sapi',$data);
        $this->load->view('footer');
    }

    function loginAdmin(){
        $this->load->view('header2');
        $this->load->view('login_admin');
        $this->load->view('footer');
    }
    
    function detailSapiUser($id){
        $this->load->model('Model_Sapi');
		$datadet['detail_sapi'] = $this->Model_Sapi->get_by_kode($id)->result();
        $datadet['gambar'] = $this->Model_Sapi->get_img_by_kode($id)->result();
        $datadet['gambar_Utama'] = $this->Model_Sapi->get_img_utama_by_id($id)->result();
        $datadet['id_sapi'] = $id;
        $this->load->view('header2');
        $this->load->view('detail_sapi_user',$datadet);
        $this->load->view('footer');
    }

    function daftar(){
        $this->load->view('header2');
        $this->load->view('register_user');
        $this->load->view('footer');
    }

    function berhasilDaftar(){
        $daftar = $this->session->userdata('daftar');
        if(!empty($daftar['id_customer'])){
        $send['user_name'] = $daftar['user_name'];
        $send['password_ku'] = $daftar['password'];
        $send['nama_customer'] = $daftar['nama_customer'];
        $send['alamat_customer'] = $daftar['alamat_customer'];

        $notif = $this->load->view('password_kirim',$send,TRUE);

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
        $to_email = $daftar['user_name'] ;
      
        $this->email->from($from_email,"Indoprima Akun"); 
        $this->email->to($to_email);
        $this->email->subject('AKUN USER'); 
        $this->email->message($notif);
        $this->email->send();

        $this->session->unset_userdata('daftar');

        $this->load->view('header2');
        $this->load->view('berhasil_daftar_pelanggan');
        $this->load->view('footer');
    }
    }

    function loginPelanggan(){
        $this->load->view('header2');
        $this->load->view('login_pelanggan');
        $this->load->view('footer');
    }

    function berhasilMasukKeranjang(){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $id = $this->input ->post('txt_id_sapi');
        $this -> load -> model('Model_Transaksi');
        $datasapi = array(
            'id_keranjang' => chr(rand(65,90)).chr(rand(65,90)).rand(1,10).rand(1,9),
            'id_sapi' => $this->input ->post('txt_id_sapi'),
            'id_customer' => $user['id_customer'],
            
        );        
        $cek = $this->Model_Transaksi->save($datasapi);        
        if($cek == true){
            $this -> load -> model('Model_Sapi');
            $datasapi = array(
                'status' => '0',
                
            );
        
        $periksa = $this->Model_Sapi->update($id,$datasapi);
        if($periksa == true){
            $this->load->view('header2');
            $this->load->view('berhasil_masuk_keranjang');
            $this->load->view('footer');
        }else{
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            redirect('Utama/detailSapiUser/'.$id);
        }
        
            
        }else{
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            redirect('Utama/detailSapiUser/'.$id);
        }
        
        }else{
            redirect('Utama/loginPelanggan');
        }
    }

   
    
    function keranjangBelanja(){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this -> load -> model('Model_Transaksi');
        $data['keranjang'] = $this->Model_Transaksi->get_keranjang($user['id_customer'])->result();
        $data['gambar'] = $this->Model_Transaksi->get_gambar('id_customer',$user['id_customer'])->result();
        $this->load->view('header2');
        $this->load->view('keranjang_belanja',$data);
        $this->load->view('footer');
        }
    }
    function Hapus_Transaksi($id_keranjang,$id_sapi)
    {

        $this->load->model('Model_Transaksi');
        $this -> load -> model('Model_Sapi');

        $hapus = $this->Model_Transaksi->delete_by_kode($id_keranjang);
        if($hapus == true){
            $datasapi = array(
                'status' => '1',
                
            );
            
            $periksa = $this->Model_Sapi->update($id_sapi,$datasapi);
            if($periksa == true){
                redirect('Utama/keranjangBelanja');
            }else{
                echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
                redirect('Utama/keranjangBelanja');
            }

        }else{
            echo "<script type='text/javascript'>alert('Gagal Hapus Data!')</script>";
            redirect('Utama/keranjangBelanja');
        }
    }

    function metodeBayar(){
    $user = $this->session->userdata('customer');
    if(!empty($user['id_customer'])){
        $this->load->view('header2');
        $this->load->view('metode_bayar');
        $this->load->view('footer');
    }
    }

    function BayarOk(){
    $id_faktur = chr(rand(65,90)).rand(1,10).rand(1,10).chr(rand(65,90));
    $user = $this->session->userdata('customer');
    if(!empty($user['id_customer'])){
        $this -> load -> model('Model_Transaksi');
        $data = $this->Model_Transaksi->get_keranjang($user['id_customer'])->result();
        $metode = $this->input ->post('Txt_metodeBayar');
        foreach ($data as $key ) {
            $datajual = array(
                'id_temp' => $key->id_keranjang,
                'id_sapi' => $key->id_sapi,
                'id_customer' => $key->id_customer,
                'id_faktur' => $id_faktur,
                'tanggal_pengambilan' => $this->input ->post('txt_tanggal_ambil') ,
                'metode_pembayaran' => $this->input ->post('Txt_metodeBayar'),
                'status_bayar' => $this->input ->post('txt_status'),
                
            );
            $this->Model_Transaksi->save_ok_temp($datajual);
            $datajual_usr = array(
                'id_transaksi' => $key->id_keranjang,
                'id_sapi' => $key->id_sapi,
                'id_customer' => $key->id_customer,
                'id_faktur' => $id_faktur,
                'tanggal_pengambilan' => $this->input ->post('txt_tanggal_ambil') ,
                'metode_pembayaran' => $this->input ->post('Txt_metodeBayar'),
                'status_bayar' => $this->input ->post('txt_status'),
                'status_pesanan' => '0'
            );
            
            $this->Model_Transaksi->save_ok_user($datajual_usr);
            // echo $key->id_sapi;
        }
        $incoice = $this->Model_Transaksi->delete_by_user($user['id_customer']);
        //print_r($data);
        if ($incoice == true){
            if($metode == 0){
            redirect('Utama/berhasilCheckout/'.$id_faktur);
        }else if($metode == 1){
            redirect('Utama/berhasilCheckoutTunai/'.$id_faktur);
        }
        }else{
            echo "<script type='text/javascript'>alert('Gagal Hapus Data!')</script>";
            redirect('Utama/metodeBayar');
        }
     }
        
    }

    function invoice($id_faktur){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this -> load -> model('Model_R_Transaksi_User');
        $send['faktur'] = $this->Model_R_Transaksi_User->get_by_kode($id_faktur)->result();
        $baca = $this->Model_R_Transaksi_User->get_by_kode($id_faktur)->result();
        foreach ($baca as $key) {
            $to_email = $key->user_name;
        }

        $notif = $this->load->view('Invoice_faktur',$send,TRUE);

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
        //$to_email = 'aemail470@gmail.com' ;
      
        $this->email->from($from_email,"Indoprima Beef"); 
        $this->email->to($to_email);
        $this->email->subject('Faktur Belanja'); 
        $this->email->message($notif);
        $this->email->send();


        $this->load->view('invoice_new',$send);
    }
    }

     function berhasilCheckout($id_faktur){
        $total = 0;
        $this -> load -> model('Model_R_Transaksi_User');
        $data = $this->Model_R_Transaksi_User->get_by_kode($id_faktur)->result();
        foreach ($data as $a) {
            $total = $total + $a->harga;
            $id_invoice = $a->id_faktur;
        }
        $send['total'] = $total;
        $send['id_faktur'] = $id_invoice;
        $this->load->view('header2');
        $this->load->view('konfirmasi_checkout',$send);
        $this->load->view('footer');
    }

    function berhasilCheckoutTunai($id_faktur){
        $total = 0;
        $this -> load -> model('Model_R_Transaksi_User');
        $data = $this->Model_R_Transaksi_User->get_by_kode($id_faktur)->result();
        foreach ($data as $a) {
            $total = $total + $a->harga;
            $id_invoice = $a->id_faktur;
        }
        $send['total'] = $total;
        $send['id_faktur'] = $id_invoice;
        $this->load->view('header2');
        $this->load->view('konfirmasi_checkout_tunai',$send);
        $this->load->view('footer');
    }

    function emailVerifikasiDP(){
        $this->load->view('email_verifikasi_dp.html');
    }

    function emailVerifikasiLunas(){
        $this->load->view('email_verifikasi_lunas.html');
    }




    
}