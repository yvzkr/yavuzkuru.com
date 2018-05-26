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
        $query = $this->db->get('articles');
        return $query->result();
    }

    public function get_join_categories_user()
    {
        $this->db->select('articles.*, categories.title as category, users.username as yazar');
        $this->db->from('articles');
        $this->db->join('categories','articles.categories_id = categories.id  ');
        $this->db->join('users','articles.user_id = users.id  ');
        $query = $this->db->get();
        return $query->result();
    }

    function insert($options = array()) {
        $this->db->insert('articles', $options);
    }
    function truncate()
    {
        $this->db->truncate('articles');
    }


}

