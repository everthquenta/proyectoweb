<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{

	public function validar ($login, $password)
    {
        $this->db->Select('*');
        $this->db->from('usuario');
        $this->db->Where('login',$login);
        $this->db->Where('password',$password);
        return $this->db->get();
    }

	
}
