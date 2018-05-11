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

    public function insert()
    {
        echo "asd";

    }

    function get_insert($options = array()) {

        $this->db->insert('categories', $options);

    }


}