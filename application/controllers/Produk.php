<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 23/07/2018
 * Time: 11:44
 */
class Produk extends CI_Controller
{

    var $gallerypath;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation','session','encryption','pagination'));
        $this->load->model('Model_Produk');
    }

    function index(){
        echo 'produk';
    }

    function ubah(){
        $id = $this->input ->post('txt_id');
        $dataProduk = array(
            'nama_produk'=>$this->input->post('txt_namaProduk'),
            'kategori'=>$this->input->post('txt_kategori'),
            'stok'=>$this->input->post('txt_stok'),
            'harga'=>preg_replace("/[^0-9]/", "", $this->input ->post('txt_harga')),
            'deskripsi'=>$this->input->post('txt_deskripsi')
        );

        $cek = $this->Model_Produk->update($id,$dataProduk);

        if($cek == true){
            redirect('Admin/detailProduk/'.$id);
        }else{
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            redirect('Admin/ubahProduk/'.$id);
        }

    }

    public function simpan(){
        $id = $this->input ->post('txt_id');
        $dataProduk = array(
            'id_produk'=>$id,
            'nama_produk'=>$this->input->post('txt_namaProduk'),
            'kategori'=>$this->input->post('txt_kategori'),
            'stok'=>$this->input->post('txt_stok'),
            'harga'=>preg_replace("/[^0-9]/", "", $this->input ->post('txt_harga')),
            'deskripsi'=>$this->input->post('txt_deskripsi')
        );

        $ses_id_produk = array(
            'idProduk' => $id
        );
        $this->session->set_userdata('idProduk',$ses_id_produk);

        $cek = $this->db->insert('tb_produk',$dataProduk);

        if($cek == true){
            redirect('Admin/inputGambarProduk');
        }else{
            echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
            $this->load->view('admin/header_admin');
            $this->load->view('admin/sidebar_admin');
            $this->load->view('admin/input_data_produk');
        }
    }

    function hapus($id){
        $gambar = $this->Model_Produk->getImgById($id)->result();
        foreach ($gambar as $b){
            // cetak($b->nama_gambar);
            $nama_foto=$b->nama_gambar;
            if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto)){
                unlink($file);
            }
        }

        $this->Model_Produk->deleteGambar($id);

        $hapus = $this->Model_Produk->deleteByKode($id);

        if($hapus == true){
            redirect('Admin/listProduk');
        }else{
            echo "<script type='text/javascript'>alert('Gagal Hapus Data!')</script>";
        }

    }
}