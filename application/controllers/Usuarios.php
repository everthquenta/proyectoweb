<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function index()
	{

		$data['msg']=$this->uri->segment(3);

		if($this->session->userdata('login'))
		{
			redirect('usuarios/panel','refresh');
		}
		else
		{ 
			// usuario no esta logueado
			
			
          
            $this->load->view('usuario/login',$data);
           
          
			
		}
	}
	public function validar()
	{
		$login=$_POST['login'];
		$password=$_POST['password'];
		$consulta=$this->usuario_model->validar($login,$password);
		
		
		if($consulta->num_rows()>0)
		{
			// tenemos una validacion efectiva
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuarios/panel','refresh');
				
				
			}
		}
		else{
			redirect('usuarios','refresh');
		}
	}
	public function panel(){
		if($this->session->userdata('login')){
	
			// el usr ya esta logueado
			redirect('asociacion/index','refresh');
		}
		else{
			redirect('usuarios','refresh');

		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios','refresh');
	}


}

