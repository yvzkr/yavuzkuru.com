<?php
/**
 * Created by PhpStorm.
 * User: yavuz
 * Date: 22/05/2018
 * Time: 12:44 AM
 */

class Picture_Model extends CI_Model
{
    function __construct()
    {
        $this->load->database();

    }
    
    public function get_insert($picture_info){
        //if picture is null
        if (!isset($picture_info["file_name"]))
            return false;
        else
        {
            $data = array(
                'title'         => $picture_info["client_name"],
                'path'          => $picture_info["file_name"]
            );

            $this->db->insert('pictures', $data);
            return $this->db->insert_id();
        }

    }



}