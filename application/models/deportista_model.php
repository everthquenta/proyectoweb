<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deportista_model extends CI_Model
{

	public function l_deportista()
	{
		$this->db->select('*'); //select*
		$this->db->from('deportista'); //tabla
		$this->db->where('estado', '1');
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function agregardeportista($data)
	{
		$this->db->insert('deportista', $data);
	}

	public function eliminardeportista($idDeportista,$data)
	{
		$this->db->where('idDeportista', $idDeportista);
		$this->db->update('deportista',$data);
	}

	public function recuperardeportista($idDeportista)
	{
		$this->db->select('*'); //select*
		$this->db->from('deportista'); //tabla
		$this->db->where('idDeportista', $idDeportista);
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function modificardeportista($idDeportista,$data)
	{
		$this->db->where('idDeportista', $idDeportista);
		$this->db->update('deportista', $data);
	}

	public function sinpersoneria()
	{
		$this->db->select('*'); //select*
		$this->db->from('deportista'); //tabla
		$this->db->where('estado', '0');
		return $this->db->get();	//devolucion del resultado de la consulta
	}
	public function buscar($palabra_buscar)
	{
		$this->db->select('*'); //select*
		$this->db->from('asociacion'); //tabla
		$this->db->where('estado', '1');
		$this->db->like('nombre', $palabra_buscar);
		$this->db->or_like('idAsociacion', $palabra_buscar);
		
		return $this->db->get();	//devolucion del resultado de la consulta
	}
}
