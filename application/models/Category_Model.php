<?php
/**
 * Created by PhpStorm.
 * User: yavuz
 * Date: 10/05/2018
 * Time: 3:18 PM
 */

class Category_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();

    }

    public function all()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    //Seed
    function insert($options = array()) {
        $this->db->insert('categories', $options);
    }
    function truncate()
    {
        $this->db->truncate('categories');
    }

}