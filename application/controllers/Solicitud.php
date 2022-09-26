<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solicitud extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$lista = $this->solicitud_model->l_solicitud();
		$data['solicitud'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('solicitud/s_lista', $data);
		$this->load->view('inc/footerlte');
	}


	


	

	public function listar_datos()
	{

		//lo cargamos a un array relacional
		$data["opcion"] = "listar";
		$data["solicitud"] = $this->solicitud_model->l_solicitud();
		
			 
			// "medicamentos" => $this->Mmedicamento->listar_medicamentos(

		$this->load->view('solicitud/s_option', $data);
	}


	public function agregar_bd_solic()
	{
		$data['idAsociacion'] = $_POST['idAsociacion'];
		$data['hojaRuta'] = $_POST['hojaRuta'];
		$data['remitente'] = $_POST['remitente'];
		$data['campeonato'] = $_POST['campeonato'];
		$data['referencia'] = $_POST['referencia'];

		
		// echo $fechaCreacion;

		// $lista = $this->Mmedicamento->agregar_medicamento($data);
		$lista = $this->solicitud_model->add_solicitud($data);
		
	}

	public function eliminar()
	{

		$idAsociacion = $_POST['idAsociacion'];
		$data['estado'] = '0';
		$this->asociacion_model->eliminarasociacion($idAsociacion, $data);
	}




	//Recibimos el id para recuperar la informacion de la bd
	public function editar_datos()
	{
		$idAsociacion = $_POST['idAsociacion'];
		$data["opcion"] = "editar";
		$data["asociacioness"]= $this->asociacion_model->recuperarasociacion($idAsociacion);
		
		
		$this->load->view('asociacion/option', $data);
	}
	public function info_datos()
	{
		$idAsociacion = $_POST['idAsociacion'];
		$data["opcion"] = "info";
		$data["asociacionessinfo"]= $this->asociacion_model->recuperarasociacion($idAsociacion);
		
		$this->load->view('asociacion/option', $data);
	}
	public function traer_datos()
	{
		$idAsociacion = $_POST['idAsociacion'];
		$data["opcion"] = "eliminar";
		$data["asociacionesss"]=$this->asociacion_model->recuperarasociacion($idAsociacion);
		

		$this->load->view('asociacion/option', $data);
	}

	public function guardar_datos()
	{

		$idAsociacion = $_POST['idAsociacion'];
		$data['nombre'] = $_POST['nombre'];
		$data['direccion'] = $_POST['direccion'];
		$data['telefono'] = $_POST['telefono'];
		$data['correo'] = $_POST['correo'];
        $data['fechaPersJuridica'] = $_POST['fechaPersJuridica'];

		$nombrearchivo=$idAsociacion.".jpg";
		$config['upload_path']='./uploads/';
		$config['file_name']=$nombrearchivo;
		$direccion = "./uploads/".$nombrearchivo;
		$linkimg="user.jpg";
		
			
			unlink($direccion);
		
		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			$data['logo']=$linkimg6;
			echo 'ingrese una  de extención jpg';
		}
		else
		{
			$data['logo']=$nombrearchivo;
			
		}

		$this->asociacion_model->modificarasociacion($idAsociacion, $data);
		$this->upload->data();
	}

	public function buscar_en_bd()
	{
		$palabra_buscar = $_POST['palabra'];

		$data ["opcion"]="buscador_s";
		$data ["asociaciondep"]= $this->asociacion_model->buscar($palabra_buscar);

		$this->load->view('solicitud/option', $data);
	}

	//cargar el formulario al modal

	public function subir_modal_solic()
	{

		$data["opcion"] ="s_formulario"; 
		$this->load->view('solicitud/s_option', $data);
	}

	public function cerrar_session()
	{
		$this->session->sess_destroy();
		echo '<script type="text/javascript">
		window.location.href ="' . base_url() . 'Clogin";
		 </script>';
	}

	//paginacion



	public function recuperar_datos_detalle()
	{

		$id_medicamento = $_POST['id_medicamento'];
		$data = array(
			"opcion" => "detalle",
			"medicament" => $this->Mmedicamento->recuperar_medicamento_con_id($id_medicamento),
		);

		$this->load->view('medicamento/VO_medicamento', $data);
	}
	public function imprimir($h = 0)
	{

		$data['h'] = $h;
		$this->load->view('tarjeta/imprimir', $data);
	}
	public function desabilitados()
	{

		$lista = $this->asociacion_model->sinpersoneria();
		$data['asociacion'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('asociacion/sinpersoneria', $data);
		$this->load->view('inc/footerlte');
	}
}
