<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Platos extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('m_platos', '', TRUE);
/*
		if(!$this->session->userdata('logged_in')){

			redirect('', 'refresh');			
		}
*/
	}

	function index(){

		$this->form_validation->set_rules('txt_plato', 'Plato', 'required|callback_validar_plato');
		$this->form_validation->set_rules('txt_cantidad', 'Cantidad', 'required|integer');
		$this->form_validation->set_message('required', 'El campo es obligatorio');
		$this->form_validation->set_message('validar_plato', 'El plato ya existe');
		
		if ($this->form_validation->run()){
			$plato 	= $this->input->post('txt_plato');
			$cantidad 	= $this->input->post('txt_cantidad');
			$estado 	= true;
			$this->m_platos->insert_platos($plato, $cantidad, $estado);
			$mensaje 	= 'Se creo exitosamente';
		}else{
			$mensaje 	= false;
		}

		$platos 	= $this->m_platos->get_platos();
		$detalles	= $this->load->view('platos_detalles', array('platos' => $platos), true);

		$datos = array(
			'mensaje'	=> $mensaje,
			'detalles'	=> $detalles,
		);

		$cabecera 	= $this->load->view('platos_cabecera', $datos, true);

		$this->load->view('principal', array('cabecera' => $cabecera), false);
	}

	function validar_plato($plato){
		$platos = $this->m_platos->get_platos(false, $plato);
		if($platos)
			return false;
		return true;
	}

	function eliminar(){
		$id_plato = $this->input->post('txt_plato');
		$this->m_platos->delete_platos($id_plato);
		$platos 	= $this->m_platos->get_platos();
		$this->load->view('platos_detalles', array('platos' => $platos), false);
	}

	function cambiar_estado(){
		$id_plato = $this->input->post('txt_plato');
		$estado 	= $this->input->post('slc_estado');
		$this->m_platos->update_platos($id_plato, $estado);
		$platos 	= $this->m_platos->get_platos();
		$this->load->view('platos_detalles', array('platos' => $platos), false);
	}
}