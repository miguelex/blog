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

    public function getPostByYearName($year='', $name='')
    {
        $result = $this->db->query("SELECT * FROM post WHERE year(fecha) = '$year' AND
                          post LIKE '$name'");
        return $result->row();
    }

    public function insert($entrada=null)
    {
      if ($entrada != null) {
        $post = $entrada['nombre'];
        $subtitulo = $entrada['descripcion'];
        $contenido = $entrada['contenido'];
        $file_name = $entrada['file_name'];

        $SQL = "INSERT INTO post(id, post, subtitulo, contenido, imagen, fecha)
                VALUES (null,'$post','$subtitulo','$contenido','$file_name',curdate());";
        if ($this->db->query($SQL)) {
          return true;
        }
      }
      return false;
    }

    public function numPost()
    {
      $number = $this->db->query("SELECT count(*) as number FROM post")->row()->number;
      return intval($number);
    }

    public function getPagination($number_per_page)
    {
      return $this->db->get("post", $number_per_page, $this->uri->segment(3));
    }
}
?>
