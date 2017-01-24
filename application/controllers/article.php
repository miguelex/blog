<?php

class Article extends CI_Controller {

    public function post($id = '')
    {
        $fila = $this->post->getPostByName($id);
        echo $fila->post;
    }
}