<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Category_Model','Picture_Model'));
        // initiate faker
        $this->faker = Faker\Factory::create();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form', 'url','date'));
        $this->load->database();
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

        $pic_info=$this->upload_image();
        print_r($pic_info);
        $picture_id=$this->Picture_Model->get_insert($pic_info);
        //echo $picture_id;
        
        //if(!isset($info["file_name"]))
        if(!$picture_id)
        {
            echo "Olmadi";
        }else{
            if($this->Category_Model->insert($pic_info,$picture_id))
            {
                redirect('admin/kategoriler');
            }else{
                redirect('admin/kategoriekle');
            }
        }
    }

    public function edit($id){
        $data = array(
            "category"   => $this->Category_Model->get_by_id($id)
        );
        print_r($data);
        if(empty($data["category"]))
            redirect('admin/kategoriler');

        $this->load->view('admin/layout/top');
        $this->load->view('admin/category/edit',$data);
        $this->load->view('admin/layout/bottom');

    }

    public function upload($id){
        if( $this->Category_Model->update($id)){
            redirect('admin/kategoriler');
        }else{
            redirect('admin/kategoriedit/'.$id);
        }
    }




    public function delete($id){

        if($this->Category_Model->delete($id)){
            return "Silindi";
        }else{
            return "Hata Oluştu";
        }
    }

    public function upload_image(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = NOW();

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
                return $this->upload->display_errors();
        }
        else
        {
                return $this->upload->data();
                //$this->load->view('upload_success', $data);
        }
    }
  




    //faker start
    function seed(){

        // seed users
        $this->_seed_users(10);

    }

    function _seed_users($limit){
        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {


            $data = array(
                'title' => $this->faker->text($maxNbChars = 10),
                'description' => $this->faker->text($maxNbChars = 20),
                'images_id'   => 3

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