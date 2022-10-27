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
	public function imprimirlistaDeportista($id)
	{
		$apoyo_pdf = $this->apoyo_model->l_apoyo_pdf($id);
		$apoyo_pdf = $apoyo_pdf->result();
			/*$detallesCliente = $this->apoyo_model->detallesCliente($id);*/
			foreach ($apoyo_pdf as $row) {

				$idSolicitud = $row->idSolicitud;
				$nombreAsoc=$row->nombre;
				$solicitante=$row->remitente;
				$fechaEntrega=$row->fechaRegistro;
				$HR=$row->hojaRuta;
				$campeonato=$row->campeonato;
				//$nombreAsoc=$row->cantidad;
				//$nit = $row->cedula;
				//$vf = $row->vf;
				//$ttal = 'Bs.- '.$row->precioUnitario;
			}


			/*foreach ($detallesCliente as $row) {
				$nombreCliente = $row->nombre .' ' .$row->primerApellido .' ' . $row->segundoApellido;
				$nit = $row->cedula;
				$vf = $row->vf;
				$ttal = 'Bs.- '.$row->precioUnitario;
			}*/
			//$nombreEmpleado = $this->session->userdata('usuario');
			$nombreEmpleado = 'Ariel Viamont Mamani';
			$this->pdf = new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages(); //numeracion
			$this->pdf->SetTitle('ActadeEntregaDIDEDE'); //titulo de los plantas del documento o del pdf
			$this->pdf->SetLeftMargin(15); //margen izq.
			$this->pdf->SetRightMargin(15); //margen derecho
			$this->pdf->SetFillColor(210, 210, 210); //color de griss
			$this->pdf->SetFont('Arial', 'B', 11); //tipo de letra y tama;o
			$this->pdf->cell(30); //tamanio de la celda
			$this->pdf->Cell(120, 10, 'ENTREGA DE MATERIAL DEPORTIVO', 0, 0, 'C', 1);
			$this->pdf->Ln(15);
			$this->pdf->SetFillColor(255, 255, 255); //color de griss
			$this->pdf->SetFont('Arial', '', 10);
			$this->pdf->Cell(50, 8, 'ASOC. DEPORTIVA. DPTAL.:', 0, 0, 'L', 1);
			$this->pdf->Cell(25, 8, $nombreAsoc, 0, 0, 'L', 0);
			$this->pdf->SetFont('Arial', 'B', 20);
			$this->pdf->Cell(0);
			$this->pdf->Cell(120, 10, 'EVENTO DEPORTIVO', 0, 0, 'C', 1);
			$this->pdf->Cell(10, 8, $campeonato, 0, 0, 'L', 1);
			$this->pdf->SetFont('Arial', '',10);
			$this->pdf->Ln(8);
			$this->pdf->Cell(20, 8, 'Solicitante:', 0, 0, 'L', 1);
			$this->pdf->Cell(10, 8, $solicitante, 0, 0, 'L', 1);
			$this->pdf->Ln(8);
			$this->pdf->Cell(28, 8, 'HOJA DE RUTA:', 0, 0, 'L', 1);
			$this->pdf->Cell(10, 8, $HR, 0, 0, 'L', 10);
			$this->pdf->Ln(8);
			$this->pdf->Cell(40, 8, 'FECHA DE ENTREGA :', 0, 0, 'L', 1);
			$this->pdf->Cell(10, 8, $fechaEntrega, 0, 0, 'L', 1);
			$this->pdf->Ln(10);
			$this->pdf->SetFont('Arial', '', 12);
			$this->pdf->MultiCell(180, 8, 'Ante la solicitud realizada por '.$solicitante.' Presidente de la '.$nombreAsoc.' quien solicita Material Deportivo de Premiacion para la realizacion del'.$campeonato.' a realizarse en la Ciudad de Cochabamba', 0, 0, 'C', 1);



			//ancho, alto, texto, borde, orden de sig celda, Alineacion LCR, FILL 0 para NO y 1 para SI
			//orden de la sig celda    (0 derecha    1 siguiente linea   2 debajo)

			$this->pdf->Ln(15); //espaciado luego del titulo del documento
			$this->pdf->SetFont('Arial', 'B', 12);
			$this->pdf->Cell(180, 5, ' DETALLE DE ENTREGA DE MATERIAL', 0, 'C', 1);
			$this->pdf->SetFont('Arial', 'B', 10);
			$this->pdf->Ln(2);
			$this->pdf->Cell(12, 5, 'Nro', 'TBLR', 0, 'C', 1);
			$this->pdf->Cell(60, 5, 'Material Deportivo', 'TBLR', 0, 'C', 1);
			$this->pdf->Cell(35, 5, 'Cat. Programatica', 'TBLR', 0, 'C', 1);
			$this->pdf->Cell(32, 5, 'Partida', 'TBLR', 0, 'C', 1);
			$this->pdf->Cell(32, 5, 'Cantidad', 'TBLR', 0, 'C', 1);
			$this->pdf->Ln(5);
			$this->pdf->SetFont('Arial', '', 9);
			$num = 1;
			foreach ($apoyo_pdf as $row) {
				$material = $row->tipomat;
				$catProg= $row->categoriaProgramatica;
				$partida= $row->partida;
				$cantidad= $row->cantidad;

				//$cantidad = $row->cantidad;
				//$precioTotal = $row->precioTotal;
				//$tt = $cantidad * $precioTotal;*/

				$this->pdf->Cell(12, 5, $num,'TBLR',  0, 'C', 0);
				$this->pdf->Cell(60, 5, $material,'TBLR', 0, 'C', 0);
				$this->pdf->Cell(35, 5, $catProg,'TBLR',  0, 'C', 0);
				$this->pdf->Cell(32, 5, $partida, 'TBLR', 0, 'C', 0);
				$this->pdf->Cell(32, 5, $cantidad, 'TBLR', 0, 'C', 0);
				
				$this->pdf->Ln(5);
				$num++;
			}
			$suma=0;
			foreach($apoyo_pdf as $row){
					$suma+=$row->cantidad;
			}
			$this->pdf->Cell(139, 5, 'Cantidad', 'TBLR', 0, 'C', 1);
			$this->pdf->Cell(32, 5, $suma, 'TBLR', 0, 'C', 1);
			$this->pdf->Ln(60);
			$this->pdf->SetFont('Arial', 'B', 10);
			$this->pdf->Cell(32, 5, '                    -----------------------------------------------------                           -----------------------------------------------------   ', 0, 'C', 1);
			$this->pdf->Cell(32, 5, '                                            FIRMA                                                                              FIRMA   ', 0, 'C', 1);
			$this->pdf->Cell(32, 5, '                                ENTREGUE CONFORME                                                RECIBI CONFORME   ', 0, 'C', 1);


			$this->pdf->Output("Listacarrito.pdf", "I");
			
	}
}
