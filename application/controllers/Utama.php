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
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Model_Produk');
        $this->load->model('Model_Transaksi');
        $this->load->model('Model_Pesanan');
        $this->session->unset_userdata('errorMsg');
    }

    function index(){

        $this->load->view('header2');
        $this->load->view('beranda');
        $this->load->view('footer');
    }

    public function googleMaps(){
        $this->load->view('header2');
        $this->load->view('map_view');
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

    function listProduk(){
        $this->session->unset_userdata('idProduk');
        $data['gambar'] = $this->Model_Produk->get_img_utama()->result();

        $jumlah_data = $this->Model_Produk->listProduk()->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Utama/listProduk/';
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
        $data['produk'] = $this->Model_Produk->list_produk_paging($config['per_page'],$from)->result();

        $this->load->view('header2');
        $this->load->view('list_produk',$data);
        $this->load->view('footer');
    }

    function listProdukLemari(){
        $this->session->unset_userdata('idProduk');
        $data['gambar'] = $this->Model_Produk->get_img_utama()->result();

        $jumlah_data = $this->Model_Produk->listLemari()->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Utama/listProdukLemari/';
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
        $data['produk'] = $this->Model_Produk->listLemariPaging($config['per_page'],$from)->result();

        $this->load->view('header2');
        $this->load->view('list_produk',$data);
        $this->load->view('footer');
    }

    function listProdukMejaKursi(){
        $this->session->unset_userdata('idProduk');
        $data['gambar'] = $this->Model_Produk->get_img_utama()->result();

        $jumlah_data = $this->Model_Produk->listMejaKursi()->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Utama/listProdukMejaKursi/';
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
        $data['produk'] = $this->Model_Produk->listMejaKursiPaging($config['per_page'],$from)->result();

        $this->load->view('header2');
        $this->load->view('list_produk',$data);
        $this->load->view('footer');
    }

    function listProdukBufet(){
        $this->session->unset_userdata('idProduk');
        $data['gambar'] = $this->Model_Produk->get_img_utama()->result();

        $jumlah_data = $this->Model_Produk->listBufet()->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Utama/listProdukBufet/';
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
        $data['produk'] = $this->Model_Produk->listBufetPaging($config['per_page'],$from)->result();

        $this->load->view('header2');
        $this->load->view('list_produk',$data);
        $this->load->view('footer');
    }

    function listProdukTempatTidur(){
        $this->session->unset_userdata('idProduk');
        $data['gambar'] = $this->Model_Produk->get_img_utama()->result();

        $jumlah_data = $this->Model_Produk->listTempatTidur()->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Utama/listProdukTempatTidur/';
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
        $data['produk'] = $this->Model_Produk->listTempatTidurPaging($config['per_page'],$from)->result();

        $this->load->view('header2');
        $this->load->view('list_produk',$data);
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

    function detailProdukUser($id){
        $datadet['detail_produk'] = $this->Model_Produk->getProdukById($id)->result();
        $datadet['gambar'] = $this->Model_Produk->getImgById($id)->result();
        $datadet['gambar_Utama'] = $this->Model_Produk->getImgUtamaById($id)->result();
        $datadet['id_produk'] = $id;
        $this->load->view('header2');
        $this->load->view('detail_produk_user',$datadet);
        $this->load->view('footer');
    }

    function daftar(){
        $this->load->view('header2');
        $this->load->view('register_user');
        $this->load->view('footer');
    }

    function berhasilDaftar(){

        /*
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

        echo "berhasil daftar !";
         }
         */
        $this->load->view('header2');
        $this->load->view('berhasil_daftar_pelanggan');
        $this->load->view('footer');
    }

    function loginPelanggan(){
        $this->load->view('header2');
        $this->load->view('login_pelanggan');
        $this->load->view('footer');
    }

    function berhasilMasukKeranjang(){
        $user = $this->session->userdata('customer');
        $stok = $this->input ->post('txt_stok_produk');

        if(!empty($user['id_customer'])){
            $id = $this->input ->post('txt_id_produk');

            if ($stok > 0) {

                $this->load->model('Model_Transaksi');
                $dataProduk = array(
                    'id_keranjang' => chr(rand(65, 90)) . chr(rand(65, 90)) . rand(1, 10) . rand(1, 9),
                    'id_produk' => $this->input->post('txt_id_produk'),
                    'id_customer' => $user['id_customer'],

                );

                $cek = $this->Model_Transaksi->save($dataProduk);
                if ($cek == true) {
                    $this->load->view('header2');
                    $this->load->view('berhasil_masuk_keranjang');
                    $this->load->view('footer');
                } else {
                    $this->session->set_flashdata('error', 'Stok tidak mencukupi !');
                    echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
                    redirect('Utama/detailProdukUser/' . $id);
                }
            }else{
                echo "<script type='text/javascript'>alert('Stok Produk Sudah Habis');</script>";
                redirect('Utama/detailProdukUser/' . $id);
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
    function Hapus_Transaksi($id_keranjang)
    {

        $this->load->model('Model_Transaksi');
        $this -> load -> model('Model_Sapi');

        $hapus = $this->Model_Transaksi->delete_by_kode($id_keranjang);
        if($hapus == true){

            redirect('Utama/keranjangBelanja');

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

        foreach ($data as $key ) {

            $dataDetailBeli = array(
                'id_transaksi' => $key->id_keranjang,
                'id_produk' => $key->id_produk,
                'id_customer' => $key->id_customer,
                'id_faktur' => $id_faktur,
            );
            
            $this->Model_Transaksi->simpanDetailBeli($dataDetailBeli);
        }

        $dataPesanan = array(
            'id_faktur' => $id_faktur,
            'nama_customer'=>$user['nama_customer'],
            'id_customer'=>$user['id_customer'],
            'status_bayar'=>'0'
        );
        $this->Model_Transaksi->simpanDataPesanan($dataPesanan);

        $incoice = $this->Model_Transaksi->delete_by_user($user['id_customer']);


        if ($incoice == true){
            redirect('Utama/berhasilCheckout/'.$id_faktur);
        }else{
            echo "<script type='text/javascript'>alert('Gagal Hapus Data!')</script>";
            redirect('Utama/keranjangBelanja');
        }
     }
        
    }

    function invoice($id_faktur){
        $user = $this->session->userdata('customer');
        if(!empty($user['id_customer'])){
        $this -> load -> model('Model_R_Transaksi_User');
        $send['faktur'] = $this->Model_Pesanan->getPesananByKode($id_faktur)->result();
        $baca = $this->Model_Pesanan->getPesananByKode($id_faktur)->result();
        foreach ($baca as $key) {
            $to_email = $key->user_name;
        }

        $notif = $this->load->view('invoice_new',$send,TRUE);

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "tapiskuy3@gmail.com";
        $config['smtp_pass'] = "asakura1.";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
       
       
        $this->email->initialize($config);
       
        $from_email = "tapiskuy3@gmail.com";
        //$to_email = 'aemail470@gmail.com' ;
      
        $this->email->from($from_email,"Irtanaz Furniture");
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