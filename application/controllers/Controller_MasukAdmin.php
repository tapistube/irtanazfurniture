<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 25/04/2018
 * Time: 20:01
 */
class Controller_MasukAdmin extends CI_Controller
{
    function index(){
        function loginAdmin(){
            $this->load->view('header2');
            $this->load->view('login_admin');
            $this->load->view('footer');
        }
    }

}