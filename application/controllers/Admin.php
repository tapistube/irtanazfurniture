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
    function index(){

        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/dashboard_admin');
    }

    function inputSapi(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/input_data_sapi');
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

    function listSapi(){
        $this->session->unset_userdata('idsapi');
        $this -> load -> model('Model_Sapi');
        $data['sapi'] = $this->Model_Sapi->list_sapi()->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin',$data);
        $this->load->view('admin/list_data_sapi');
    }

    function detailSapi($id){
        $this->load->model('Model_Sapi');
		$datadet['detail_sapi'] = $this->Model_Sapi->get_by_kode($id)->result();
        $datadet['gambar'] = $this->Model_Sapi->get_img_by_kode($id)->result();
        $datadet['id_sapi'] = $id;
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_sapi',$datadet);
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
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            redirect('Admin/detail_pelanggan/'.$id_customer);
        }
    }
    function detailPesanan(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_pesanan');
    }

    function listPesanan(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/list_data_pesanan');
    }

    function listPenjualan(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/list_data_penjualan');
    }

    function detailPenjualan(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/sidebar_admin');
        $this->load->view('admin/detail_penjualan');
    }

}