<?php

    class Profile extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          if (!$this->session->userdata('login')) {
            header ("Location: ".base_url());
          }
        }

        public function index ()
        {
            $data = array('titulo' => 'Perfil');
            $this->load->view("/guest/head", $data);

            $data = array('app' => 'Blog');
            $this->load->view("/guest/nav", $data);

            $data = array('post' => 'Perfil', 'descripcion' => 'Para modificar posts y demas', 'img' => 'home-bg.jpg');
            $this->load->view("/guest/header", $data);
            //$result = $this->post->getPost();
            //$data = array('consulta' => $result);
            $data['post'] = $this->post->getPost();
            $this->load->view("/user/content", $data);
            $this->load->view("/guest/footer");
        }
    }

?>
