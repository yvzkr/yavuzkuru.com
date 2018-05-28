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

    public function insert($image_info,$picture_id)
    {
        $this->form_validation->set_rules('title', 'Başlık Adı', 'required');
        $this->form_validation->set_rules('description', 'Açıklama', 'required');
        if(! $this->form_validation->run() == FALSE )
        {
            return false;
        }

        $data = array(
            'title'         => $this->input->post('title'),
            'description'   => $this->input->post('description'),
            'images_id'     => $picture_id
        );

        $this->db->insert('categories', $data);
        return true;
    }

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Başlık Adı', 'required');
        $this->form_validation->set_rules('description', 'Açıklama', 'required');
        if( $this->form_validation->run() == FALSE )
        {
            return false;
        }
        $data = array(
            'title'         => $this->input->post('title'),
            'description'   => $this->input->post('description')
        );
        $where                        = array(
            'id'                        => $id
        );

        $this->db->update('categories', $data, $where );
        return true;
    }



    public function get_by_id($id){
        $query = $this->db->get_where('categories',array('id'=>$id));
        return $query->result()[0];

    }

    public function delete($id){
        $this->db->delete('categories', array('id' => $id));
        if($this->db->affected_rows()){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function get_insert($options = array()) {
        $this->db->insert('categories', $options);
    }



    


}