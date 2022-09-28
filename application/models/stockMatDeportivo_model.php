<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockMatDeportivo_model extends CI_Model
{

	public function l_stockMatDeportivo()
	{
		$this->db->select('*'); //select*
		$this->db->from('stockMatDeportivo'); //tabla
		$this->db->where('estado', '1');
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function agregarstockMatDeportivo($data)
	{
		$this->db->insert('stockmatdeportivo', $data);
	}

	public function eliminarasociacion($idAsociacion,$data)
	{
		$this->db->where('idAsociacion', $idAsociacion);
		$this->db->update('asociacion',$data);
	}

	public function recuperarasociacion($idAsociacion)
	{
		$this->db->select('*'); //select*
		$this->db->from('asociacion'); //tabla
		$this->db->where('idAsociacion', $idAsociacion);
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function modificarasociacion($idAsociacion, $data)
	{
		$this->db->where('idAsociacion', $idAsociacion);
		$this->db->update('asociacion', $data);
	}

	public function sinpersoneria()
	{
		$this->db->select('*'); //select*
		$this->db->from('asociacion'); //tabla
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
