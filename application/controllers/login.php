<?php
/**
 *
 */
class Login extends CI_Controller
{

  public function index()
  {
    $usuario = $this->input->post('user');
    $password = $this->input->post('password');
    
    $data = array(
            'user'  => $usuario ,
            'id'    => 0,
            'login' => true
          );

    $this->session->set_userdata($data);

    echo $this->session->userdata('user');
  }
}
