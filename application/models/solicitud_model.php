<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solicitud_model extends CI_Model
{

	public function l_solicitud()
	{
		$this->db->select('s.hojaRuta, a.nombre, s.remitente, s.campeonato, s.idSolicitud'); //select*
		$this->db->from('solicitud s'); //tabla
		$this->db->join('asociacion a', 'a.idAsociacion=s.idAsociacion'); //tabla
		$this->db->where('a.estado', '1');
		$this->db->where('s.estado', '1');
		$this->db->order_by('s.idsolicitud','desc');

		
		return $this->db->get();	//devolucion del resultado de la consulta
	}

	public function add_solicitud($data)
	{
		$this->db->insert('solicitud', $data);
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
}
