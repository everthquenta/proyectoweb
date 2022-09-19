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
		$data["asociaciones"] = $this->asociacion_model->l_asociacion();
		
			 
			// "medicamentos" => $this->Mmedicamento->listar_medicamentos(

		$this->load->view('asociacion/option', $data);
	}


	public function agregar_bd()
	{
		$data['nombre'] = $_POST['nombre'];
		$data['direccion'] = $_POST['direccion'];
		$data['telefono'] = $_POST['telefono'];
		$data['correo'] = $_POST['correo'];
        $data['fechaPersJuridica'] = $_POST['fechaPersJuridica'];

		$nombrearchivo=$idAsociacion.".jpg";
		//Ruta donde se guarda el fichero
		$config['upload_path']='./uploads/';
		//Nombre del Archivo
		$config['file_name']=$nombrearchivo;
		//reemplazar los archivos
		$direccion = "./uploads/".$nombrearchivo;
		unlink($direccion);
		$linkimg="user.jpg";
		
		//tipos de archivo permitidos
		$config['allowed_types']='jpg|png|jpeg|gif'; //'jpeg'|
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			//si hay algun error pasaremos la lista
			$data['logo']=$linkimg;
			
		}
		else{
			$data['logo']=$nombrearchivo;
			
			
		}
		// echo $fechaCreacion;

		// $lista = $this->Mmedicamento->agregar_medicamento($data);
		$lista = $this->asociacion_model->agregarasociacion($data);
		$this->upload->data();
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

	public function buscar_en_bd($pag = 1)
	{
		$pag--;

		if ($pag < 0) {
			$pag = 0;
		}


		$pag_size = 3;
		$offset = $pag * $pag_size;

		$lista = $this->Asociacion->pagination($pag_size, $offset);
		$data['asociacion'] = $lista;


		// aca empieza

		$palabra_buscar = $_POST['palabra'];

		$data = array(
			"opcion" => "buscador",
			"asociacion" => $this->Asociacion->buscar($palabra_buscar),
			'last_pag' => ceil($this->Asociacion->count() / $pag_size),
			'current_pag' => $pag,

		);
		$this->load->view('asociacion/VO_medicamento', $data);
	}

	//cargar el formulario al modal

	public function subir_modal()
	{

		$data["opcion"] ="formulario"; 
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
