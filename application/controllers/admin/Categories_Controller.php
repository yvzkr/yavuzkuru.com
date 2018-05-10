<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_Model');
        // initiate faker
        $this->faker = Faker\Factory::create();
        $this->load->library('session');
    }

    public function index()
    {
        $data           = array(
            "posts"     => $this->Category_Model->all()
        );

        $this->load->view('admin/layout/top');
        $this->load->view('admin/category/index',$data);
        $this->load->view('admin/layout/bottom');
    }

//faker start
    function seed()
    {
        // purge existing data
        //$this->_truncate_db();

        // seed users
        $this->_seed_users(25);

        // call more seeds here...
    }

    function _seed_users($limit)
    {
        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {


            $data = array(
                'title' => $this->faker->word,
                'description' => $this->faker->text($maxNbChars = 20)

            );
            $this->Category_Model->insert($data);
        }
        $this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        redirect('admin/kategoriler', 'location');
    }

    private function _truncate_db()
    {
        $this->Category_Model->truncate();
    }
//faker finish
}