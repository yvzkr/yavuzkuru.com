<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class Posts_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_Model');
        // initiate faker
        $this->faker = Faker\Factory::create();
        $this->load->library('session');
    }

    public function index()
    {
        $data           = array(
            "posts"     => $this->Post_Model->get_join_categories_user()
        );


        $this->load->view('admin/layout/top');
        $this->load->view('admin/post/index',$data);
        $this->load->view('admin/layout/bottom');
    }

    public function add(){




    }

    function seed()
    {
        // purge existing data
        $this->_truncate_db();

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
                'content' => $this->faker->text($maxNbChars = 20),
                'user_id' => 1,
                'categories_id' => $this->faker->numberBetween(1,50)
            );
            $this->Post_Model->insert($data);
        }
        $this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        redirect('admin/makaleler', 'location');
    }

    private function _truncate_db()
    {
        $this->Post_Model->truncate();
    }



}

