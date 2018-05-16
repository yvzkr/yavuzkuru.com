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
        $this->load->helper(array('form', 'url','date'));
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

    public function add()
    {
        $this->load->view('admin/layout/top');
        $this->load->view('admin/category/add');
        $this->load->view('admin/layout/bottom');
    }

    public function create(){
        echo NOW()."<br>";
        echo $this->input->post("title");
        $this->upload_image();

        echo NOW();
       /* if($this->Category_Model->insert())
        {
            redirect('admin/kategoriler');
        }else{
            redirect('admin/kategoriekle');
        }*/
    }

    public function upload_image(){
        // Check form submit or not

            $data = array();
            if(!empty($_FILES['file']['name'])){
                // Set preference
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '100'; // max_size in kb
                $config['file_name'] =NOW();
                // Load upload library $_FILES['file']['name']
                $this->load->library('upload',$config);

                // File upload
                if($this->upload->do_upload('file')){
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['response'] = 'successfully uploaded '.$filename;
                }else{
                    $data['response'] = 'failed';
                }
            }else{
                //add flash data
                $this->session->set_flashdata('item','item-value');
            }
            // load view
            //$this->load->view('user_view',$data);

    }









    //faker start
    function seed()
    {

        // seed users
        $this->_seed_users(25);

    }

    function _seed_users($limit)
    {
        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {


            $data = array(
                'title' => $this->faker->word,
                'description' => $this->faker->text($maxNbChars = 20)

            );
            $this->Category_Model->get_insert($data);
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