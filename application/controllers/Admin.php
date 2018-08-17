<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 31/03/2018
 * Time: 8:03
 */
class Admin extends CI_Controller
{
    var $gallerypath;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation','session','encryption','pagination'));
        $this->load->model('Model_Produk');
        $this->load->model('Model_R_Transaksi_User');
        $this->load->model('Model_Pesanan');
        $this->load->model('Model_Penjualan');
        $this->load->model('Model_User');
        $this->load->library('dompdf_gen');

        $userSession = $this->session->userdata('admin');
        if ($userSession['bagian'] != "admin"){
            redirect('Login');
        }

    }

    function tes(){
        $baca = $this->Model_Pesanan->getDataPesanan()->result();
        print_r($baca);
    }

    function index(){

        $data['jml_pesanan'] =  $this->Model_Pesanan->listPesanan()->num_rows();
        $data['jml_produk'] = $this->Model_Produk->listProduk()->num_rows();
        $data['jml_penjualan'] = $this->Model_Penjualan->listPenjualan()->num_rows();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/dashboard_admin',$data);
    }

    function inputSapi(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/input_data_sapi');
    }

    function inputProduk(){
        $idProduk = $this->Model_Produk->getKodeProduk();
        //print_r($idProduk);
        $data["idProduk"] = $idProduk;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/input_data_produk',$data);

    }

    function ubahPass(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/ubah_pass_admin');
    }
    
    function inputGambarSapi(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/upload_foto_sapi');
    }

    function inputGambarProduk(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/upload_foto_produk');
    }

    function listSapi(){
        $this->session->unset_userdata('idsapi');
        $this -> load -> model('Model_Sapi');
        $data['sapi'] = $this->Model_Sapi->list_sapi()->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin',$data);
        $this->load->view('admin/list_data_sapi');
    }

    function listProduk(){
        $this->session->unset_userdata('idProduk');
       // echo "berhasil uplaod data gambar ! ";
        $data['produk'] = $this->Model_Produk->listProduk()->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin',$data);
        $this->load->view('admin/list_data_produk');
    }

    function detailSapi($id){
        $this->load->model('Model_Sapi');
		$datadet['detail_sapi'] = $this->Model_Sapi->get_by_kode($id)->result();

        $datadet['id_sapi'] = $id;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_sapi',$datadet);
    }

    function detailProduk($id){
        $datadet['detail_produk'] = $this->Model_Produk->getProdukById($id)->result();
        $datadet['gambar'] = $this->Model_Produk->getImgById($id)->result();
        $datadet['gambar_Utama'] = $this->Model_Produk->getImgUtamaById($id)->result();
        $datadet['id_produk'] = $id;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_produk',$datadet);
    }

    function lanjutKeUpload(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/upload_foto_sapi');
    }

    function ubahSapi($id){
        $this->load->model('Model_Sapi');
		$datadet['detail_sapi'] = $this->Model_Sapi->get_by_kode($id)->result();
        $datadet['gambar'] = $this->Model_Sapi->get_img_by_kode($id)->result();
        $datadet['id_sapi'] = $id;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/ubah_data_sapi',$datadet);
    }

    function ubahProduk($id){
        $datadet['detail_produk'] = $this->Model_Produk->getProdukById($id)->result();
        $datadet['gambar'] = $this->Model_Produk->getImgById($id)->result();
        $datadet['gambar_Utama'] = $this->Model_Produk->getImgUtamaById($id)->result();
        $datadet['id_produk'] = $id;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/ubah_data_produk',$datadet);
    }

    function ubahFotoSapi($id){
        $this->load->model('Model_Sapi');
		$datadet['detail_sapi'] = $this->Model_Sapi->get_by_kode($id)->result();
        $datadet['gambar'] = $this->Model_Sapi->get_img_by_id($id)->result();
        $datadet['id_sapi'] = $id;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/ubah_foto_sapi',$datadet);
    }

    function listPelanggan(){
        $this->load->model('Model_User');
        $data['customer'] = $this->Model_User->list_user()->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/list_data_pelanggan',$data);
    }

    function detailPelanggan($id_customer){
        $this->load->model('Model_User');
        $data['customer'] = $this->Model_User->get_by_kode($id_customer)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_pelanggan',$data);
    }
    function Hapus_Customer($id_customer){
        $this->load->model('Model_User');
        $status = $this->Model_User->delete_by_kode($id_customer);
        if($status == true){
            redirect('Admin/listPelanggan');
        }else{
            echo "<script type='text/javascript'>alert('Data gagal dihapus');</script>";
            redirect('Admin/detail_pelanggan/'.$id_customer);
        }
    }
    function detailPesanan($id_faktur){

        $dataDetail = $this->Model_Pesanan->getPesananByKode($id_faktur)->result();
        $data['Pesanan'] = $dataDetail;
        $data['gambar'] = $this->Model_R_Transaksi_User->getImgById($id_faktur)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_pesanan',$data);
    }

    function listPesanan(){
        $jumlah_data = $this->Model_Pesanan->listPesanan()->num_rows();
        $config['base_url'] = base_url().'Admin/listPesanan/';
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
        $data['pesanan'] = $this->Model_Pesanan->listPesananPaging($config['per_page'],$from)->result();


        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/list_data_pesanan',$data);
    }

    function listPenjualan(){
        $jumlah_data = $this->Model_Penjualan->listPenjualan()->num_rows();
        $config['base_url'] = base_url().'Admin/listPenjualan/';
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
        $data['penjualan'] = $this->Model_Penjualan->listPenjualanPaging($config['per_page'],$from)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/list_data_penjualan',$data);
    }

    function detailPenjualan($id_faktur){
        $dataDetail = $this->Model_Pesanan->getPesananByKode($id_faktur)->result();
        $data['Penjualan'] = $dataDetail;
        $data['gambar'] = $this->Model_R_Transaksi_User->getImgById($id_faktur)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_penjualan',$data);
    }

    function verifikasiDP($id_faktur){
        $dataUbah = array(
            'status_bayar'=>"1"
        );

        $this->db->where('id_faktur',$id_faktur);
        $this->db->update("tb_pesanan",$dataUbah);

        redirect('Admin/detailPesanan/'.$id_faktur);
    }

    function verifikasiLunas($id_faktur){
        $dataUbah = array(
            'status_bayar'=>"2"
        );

        $this->db->where('id_faktur',$id_faktur);
        $this->db->update("tb_pesanan",$dataUbah);

        //ada cding buat mindahin pesanan ke tabel penjualan

        $nama_customer = "";
        $id_customer = "";
        $pesanan = $this->Model_Pesanan->getPesananByKode($id_faktur)->result();
        foreach ($pesanan as $b){
            $nama_customer = $b->nama_customer;
            $id_customer = $b->id_customer;
        }

        //----- algoritma mengurangi stok di tb Produk -----
        foreach ($pesanan as $c){
            $id_produk = $c->id_produk;
            $stok = $c->stok;

            if ($stok > 0){
                $stokUpdate = $stok - 1;
                $dataUbahStok = array(
                    'stok'=>$stokUpdate
                );

                $this->db->where('id_produk',$id_produk);
                $this->db->update("tb_produk",$dataUbahStok);
            }

        }

        $dataPenjualan = array(
            'id_penjualan'=>chr(rand(65, 90)) . chr(rand(65, 90)) . rand(1, 10) . rand(1, 9),
            'id_faktur' => $id_faktur,
            'nama_customer'=>$nama_customer,
            'id_customer'=>$id_customer,
        );
        $this->db->insert("tb_penjualan",$dataPenjualan);

        //hapus dari tb pesanan
        $this->db->where('id_faktur',$id_faktur);
        $this->db->delete("tb_pesanan");


        redirect('Admin/detailPesanan/'.$id_faktur);
    }

    function lapPenjualan(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/laporan_penjualan');
    }

    function lapProduk(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/laporan_produk');
    }

    function lapJualbyTanggal(){
        $tgl_surat = $this->input->post('hari');
        $bln_surat = $this->input->post('bulan');
        $thn_surat = $this->input->post('tahun');
        $tanggal = $thn_surat . "-" . $bln_surat . "-" . $tgl_surat;

        $tgl_surat2 = $this->input->post('hari2');
        $bln_surat2 = $this->input->post('bulan2');
        $thn_surat2 = $this->input->post('tahun2');
        $tanggal2 = $thn_surat2 . "-" . $bln_surat2 . "-" . $tgl_surat2;

        $penjualan = $this->Model_Penjualan->reportPenjualan($tanggal,$tanggal2)->result();

       $data['penjualan'] = $penjualan;
        $data['tanggal'] = date('Y-m-d H:i:s');

        //load laporan
        $this->load->view('report/report_penjualan', $data);

        $paper_size  = 'A4'; //paper size
        $orientation = 'portrait'; //tipe format kertas
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_penjualan.pdf", array('Attachment'=>0));
    }

    function laporanProduk(){

        $data['produk'] = $this->Model_Produk->listProduk()->result();
        $data['tanggal'] = date('Y-m-d H:i:s');
        //load laporan
        $this->load->view('report/report_produk', $data);

        $paper_size  = 'A4'; //paper size
        $orientation = 'portrait'; //tipe format kertas
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_produk.pdf", array('Attachment'=>0));

    }
}