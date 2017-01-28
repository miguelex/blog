<?php

class Post extends CI_Model {

    public function getPost ()
    {
        return $this->db->get('post');
    }

    public function getPostById($id=''){
        $result = $this->db->query("SELECT * FROM post WHERE id ='".$id."' LIMIT 1");
        return $result->row();
    }
}
?>
