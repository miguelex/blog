<?php

class Article extends CI_Controller {

    public function post($year, $name)
    {
        //$fila = $this->post->getPostById($id);
        $fila = $this->post->getPostByYearName($year, $name);
        if ($fila==null) {
          echo "ERROR";
          return;
        }
        $data = array('titulo' => $fila->post);
        $this->load->view("/guest/head", $data);

        $data = array('app' => 'Blog');
        $this->load->view("/guest/nav", $data);

        //codigo para poner imagenes en post que no las tenga
        $backimage="";
        if(!isset($fila->imagen) | $fila->imagen == ''){
          $backimage = 'home-bg.jpg';
        } else {
          $backimage = $fila->imagen;
        }
        $data = array('post' => $fila->post, 'descripcion' => $fila->subtitulo, 'img' => $backimage);
        $this->load->view("/guest/header", $data);

        $data = array('contenido' => $fila->contenido);
        $this->load->view("/guest/post", $data);

        $this->load->view("/guest/footer");
    }

    public function nuevo()
    {
      if (!$this->session->userdata('login')) {
        header ("Location: ".base_url());
      }
      $data = array('titulo' => 'Crear nuevo Post');
      $this->load->view("/guest/head", $data);

      $data = array('app' => 'Blog');
      $this->load->view("/guest/nav", $data);

      $data = array('post' => 'Nuevo Post', 'descripcion' => 'Creando nuevo post', 'img' => 'home-bg.jpg');
      $this->load->view("/guest/header", $data);
      $result = $this->post->getPost();
      $data = array('consulta' => $result);
      $this->load->helper('bootstrap');
      $this->load->view("/user/nuevo");
      $this->load->view("/guest/footer");
    }

    public function insert()
    {
      if (!$this->session->userdata('login')) {
        header ("Location: ".base_url());
      }
      $post = $this->input->post();
      $this->load->model('file');
      //Hay que poner la ruta compelta, no va con la relativa
      $file_name=$this->file->UploadImage('C:\xampp\htdocs\blog\plantilla\img','No es posible subir la imagen...');
      $post['file_name'] = $file_name;
      $bool = $this->post->insert($post);
      if ($bool) {
        header ("Location: ".base_url()."profile");
      } else {
        header ("Location: ".base_url()."article/nuevo");
      }
    }
}
