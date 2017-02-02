<?php

/**
 *
 */
class User extends CI_Model
{

  public function getUser($usuario ='')
  {
    $result = $this->db->query("SELECT * FROM user WHERE usuario ='".$usuario."' LIMIT 1");
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return null;
    }
  }
}

?>
