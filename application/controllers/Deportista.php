<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deportista extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$lista = $this->deportista_model->l_deportista();
		$data['deportista'] = $lista;


		$this->load->view('inc/headerlte');
		$this->load->view('deportista/d_lista', $data);
		$this->load->view('inc/footerlte');
	}


	


	

	public function listar_datos_deportista()
	{

		//lo cargamos a un array relacional
		$data["opcion"] = "listar";
		$data["deportistas"] = $this->deportista_model->l_deportista();
		
			 
			// "medicamentos" => $this->Mmedicamento->listar_medicamentos(

		$this->load->view('deportista/d_option', $data);
	}


	public function agregar_bd_deportista()
	{	
		
		$data['idAsociacion'] = $_POST['idAsociacion'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
		$data['cedula'] = $_POST['cedula'];
		$data['fichaMedica'] = $_POST['fichaMedica'];
		
		$data['perfil'] = $_FILES['perfil'];

		
		// echo $fechaCreacion;
		$lista = $this->deportista_model->agregardeportista($data);
		// $lista = $this->Mmedicamento->agregar_medicamento($data);
		
	}

	public function eliminar_deportista()
	{

		$idDeportista = $_POST['idDeportista'];
		$data['estado'] = '0';
		$this->deportista_model->eliminardeportista($idDeportista, $data);
	}




	//Recibimos el id para recuperar la informacion de la bd
	public function editar_datos_deportista()
	{
		$idDeportista = $_POST['idDeportista'];
		$data["opcion"] = "editar_deportista";
	
		$data["deportistaedi"]= $this->deportista_model->recuperardeportista($idDeportista,$data);
		$this->load->view('deportista/d_option', $data);
		
	}
	public function info_datos_deportista()
	{
		$idDeportista = $_POST['idDeportista'];
		$data["opcion"] = "info_deportista";
		$data["deportistainfo"]= $this->deportista_model->recuperardeportista($idDeportista);
		
		$this->load->view('deportista/d_option', $data);
	}
	public function traer_datos()
	{
		$idDeportista = $_POST['idDeportista'];
		$data["opcion"] = "eliminar_deportista";
		$data["deportista_eliminar"]=$this->deportista_model->recuperarDeportista($idDeportista);
		

		$this->load->view('deportista/d_option', $data);
	}

	public function guardar_datos_deportista()
	{

		$idAsociacion = $_POST['idAsociacion'];
		$idDeportista= $_POST['idDeportista'];
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
		$data['cedula'] = $_POST['cedula'];
		$data['fichaMedica'] = $_POST['fichaMedica'];

		$nombrearchivo=$idDeportista.".jpg";
		$config['upload_path']='./uploads/deportistas';
		$config['file_name']=$nombrearchivo;
		$direccion ="./uploads/deportistas/".$nombrearchivo;
		$linkimg="user.jpg";
		
		if(file_exists($direccion))
			{
				unlink($direccion);
			}
			
		
		$config['allowed_types']='jpg|png';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			//$data['logo']=$linkimg;
			$data['perfil']=$this->upload->display_errors();
			//echo 'ingrese una  de extención jpg';
		}
		else
		{
			$data['perfil']=$nombrearchivo;
			
		}

		$this->deportista_model->modificardeportista($idDeportista, $data);
		$this->upload->data();

	}

	public function buscar_en_bd()
	{
	
		// aca empieza

		$palabra_buscar = $_POST['palabra'];

		$data ["opcion"]="buscador";
		$data ["asociaciondep"]=$this->asociacion_model->buscar($palabra_buscar);

		$this->load->view('asociacion/option', $data);
	}
	public function buscar_en_bds()
	{
	
		// aca empieza

		$palabra_buscar = $_POST['palabra'];

		$data ["opcion"]="buscador_s";
		$data ["asociaciondeportiva"]= $this->asociacion_model->buscar($palabra_buscar);

		$this->load->view('asociacion/option', $data);
	}

	//cargar el formulario al modal

	public function subir_modal_deportista()
	{

		$data["opcion"] ="formulario_d"; 
		$this->load->view('deportista/d_option', $data);
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
