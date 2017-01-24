<?php

    class Home extends CI_Controller {

        public function index ()
        {
            $data = array('titulo' => 'Home');
            $this->load->view("/guest/head", $data);

            $data = array('app' => 'Blog');
            $this->load->view("/guest/nav", $data);

            $data = array('post' => 'Blog', 'descripcion' => 'Mi blog en Codeigniter');
            $this->load->view("/guest/header", $data);
            $result = $this->post->getPost();
            $data = array('consulta' => $result);
            $this->load->view("/guest/content", $data);
            $this->load->view("/guest/footer");
        }
    }

?>