<?php
/**
 * Created by PhpStorm.
 * User: yavuz
 * Date: 09/05/2018
 * Time: 9:41 PM
 */

class Post_Model extends CI_Model
{
    function __construct(){
        $this->load->database();

    }

    public function all()
    {
        $query = $this->db->get('article');
        return $query->result();
    }

    function insert($options = array()) {
        $this->db->insert('article', $options);
    }
    function truncate()
    {
        $this->db->truncate('article');
    }
    function get()
    {
        $query = $this->db->get('article');
        return $query->result();
    }

}

