<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sabores extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('m_sabores', '', TRUE);
/*
		if(!$this->session->userdata('logged_in')){

			redirect('', 'refresh');			
		}
*/	}

	function index(){

		$this->form_validation->set_rules('txt_sabor', 'Sabor', 'required|callback_validar_sabor');
		$this->form_validation->set_rules('txt_ingrediente', 'Ingrediente', 'required');
		$this->form_validation->set_message('required', 'El campo es obligatorio');
		$this->form_validation->set_message('validar_sabor', 'El sabor ya existe');
		
		if ($this->form_validation->run()){
			$sabor 			= $this->input->post('txt_sabor');
			$ingrediente 	= $this->input->post('txt_ingrediente');
			$estado 	= true;
			$this->m_sabores->insert_sabores($sabor, $ingrediente, $estado);
			$mensaje 	= 'Se cargo exitosamente';
		}else{
			$mensaje 	= false;
		}

		$sabores 	= $this->m_sabores->get_sabores();
		$detalles	= $this->load->view('sabores_detalles', array('sabores' => $sabores), true);

		$datos = array(
			'mensaje'	=> $mensaje,
			'detalles'	=> $detalles,
		);

		$cabecera 	= $this->load->view('sabores_cabecera', $datos, true);

		$this->load->view('principal', array('cabecera' => $cabecera), false);
	}

	function validar_sabor($sabor){
		$sabores = $this->m_sabores->get_sabores(false, $sabor);
		if($sabores)
			return false;
		return true;
	}

	function eliminar(){
		$id_sabor = $this->input->post('txt_sabor');
		$this->m_sabores->delete_sabores($id_sabor);
		$sabores 	= $this->m_sabores->get_sabores();
		$this->load->view('sabores_detalles', array('sabores' => $sabores), false);
	}

	function cambiar_estado(){
		$id_sabor = $this->input->post('txt_sabor');
		$estado 	= $this->input->post('slc_estado');
		$this->m_sabores->update_sabores($id_sabor, $estado);
		$sabores 	= $this->m_sabores->get_sabores();
		$this->load->view('sabores_detalles', array('sabores' => $sabores), false);
	}
}