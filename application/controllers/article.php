<?php

class Article extends CI_Controller {

    public function post($id = '')
    {
        $fila = $this->post->getPostById($id);

        $data = array('titulo' => $fila->post);
        $this->load->view("/guest/head", $data);

        $data = array('app' => 'Blog');
        $this->load->view("/guest/nav", $data);

        $data = array('post' => $fila->post, 'descripcion' => $fila->subtitulo);
        $this->load->view("/guest/header", $data);

        $data = array('contenido' => $fila->contenido);
        $this->load->view("/guest/post", $data);

        $this->load->view("/guest/footer");
    }
}
