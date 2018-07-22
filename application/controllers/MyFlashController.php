<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 9/22/2017
 * Time: 10:45 AM
 */
class MyFlashController extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function success()
    {
        $this->session->set_flashdata('success', 'Berhasil');
        return $this->load->view('myPages');
    }

    public function error()

    {

        $this->session->set_flashdata('error', 'Something is wrong.');

        return $this->load->view('myPages');

    }


    /**

     * Get All Data from this method.

     *

     * @return Response

     */

    public function warning()

    {

        $this->session->set_flashdata('warning', 'Something is wrong.');

        return $this->load->view('myPages');

    }


    /**

     * Get All Data from this method.

     *

     * @return Response

     */

    public function info()

    {

        $this->session->set_flashdata('info', 'User listed bellow');

        return $this->load->view('myPages');

    }



}