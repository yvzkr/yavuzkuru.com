<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view('admin/layout/top');
        $this->load->view('admin/post/index');
        $this->load->view('admin/layout/bottom');
    }
}

