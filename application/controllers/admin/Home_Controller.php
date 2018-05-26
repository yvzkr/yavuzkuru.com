<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('security');

    }

    public function index()
    {
        $this->load->view('admin/layout/top');
        $this->load->view('admin/home/index');
        $this->load->view('admin/layout/bottom');
    }
}

