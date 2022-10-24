<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apoyo_model extends CI_Model
{

	public function l_apoyo()
	{
		$this->db->select('s.idSolicitud, a.cantidad, a.fechaRegistro, st.tipoMat, asoc.nombre'); //select*
		$this->db->from('apoyo a'); //tabla
		$this->db->join('solicitud s', 's.idSolicitud=a.idSolicitud');
		$this->db->join('asociacion asoc', 'asoc.idAsociacion=s.idAsociacion'); //tabla
		$this->db->join('stockMatDeportivo st', 'st.idStockMatDeportivo=a.idStockMatDeportivo'); //tabla
		$this->db->where('a.estado', '1');
		$this->db->where('s.estado', '1');
		$this->db->group_by('a.idSolicitud');
		$this->db->order_by('s.idSolicitud','desc');

		
		return $this->db->get();	//devolucion del resultado de la consulta
	}
	public function l_apoyo_pdf($id)
	{
		$this->db->select('s.campeonato,s.idSolicitud,s.hojaRuta, a.cantidad, a.fechaRegistro, st.tipomat, asoc.nombre, s.remitente, a.fechaRegistro, st.categoriaProgramatica,st.partida'); //select*
		$this->db->from('apoyo a'); //tabla
		$this->db->join('solicitud s', 's.idSolicitud=a.idSolicitud');
		$this->db->join('asociacion asoc', 'asoc.idAsociacion=s.idAsociacion'); //tabla
		$this->db->join('stockMatDeportivo st', 'st.idStockMatDeportivo=a.idStockMatDeportivo'); //tabla
		$this->db->where('a.estado', '1');
		$this->db->where('s.idSolicitud', $id);
		$this->db->order_by('s.idSolicitud','desc');

		
		return $this->db->get();	//devolucion del resultado de la consulta
	}
//auxiliar de venta 
	public function detallesCliente()
	{
		$this->db->select('s.hojaRuta, a.nombre, s.remitente, s.campeonato, s.idSolicitud'); //select*
		$this->db->from('solicitud s'); //tabla
		$this->db->join('asociacion a', 'a.idAsociacion=s.idAsociacion'); //tabla
		$this->db->where('a.estado', '1');
		$this->db->where('s.estado', '1');
		$this->db->order_by('s.idsolicitud','desc');

		
		return $this->db->get();	//devolucion del resultado de la consulta
	}
	public function l_apoyo_deportista()
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
	public function Reg_entregaMaterial($data)
	{
		$this->db->insert('apoyo',$data);
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
