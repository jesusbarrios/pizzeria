<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recepcion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct(){
        parent::__construct();
        // Your own constructor code
        $this->load->model('m_recepciones');
    }

	public function index(){
		$pedidos 	= $this->m_recepciones->get_pedidos();
		$datos		= array(
			'pedidos'	=> $pedidos,
		);
		$detalles 	= $this->load->view('recepcion_detalles', $datos, true);
		$datos 		= array(
			'platos'	=> false,
			'sabores'	=> false,
			'detalles'	=> $detalles,
		);
		$cabecera 	= $this->load->view('recepcion_cabecera', $datos, true);
		$datos 		= array(
			'cabecera'	=> $cabecera,
		);
		$this->load->view('principal', $datos, false);
	}

	public function estados(){
		$this->load->model('m_recepciones');
		$menu 		= $this->load->view('menu', false, true);
		$estados 	= $this->m_recepciones->get_estados();
		$datos		= array(
			'estados'	=> $estados,
		);
		$detalles 	= $this->load->view('estados_detalles', $datos, true);
		$datos 		= array(
			'detalles'	=> $detalles,
		);
		$cabecera 	= $this->load->view('estados_cabecera', $datos, true);
		$datos 		= array(
			'menu'		=> $menu,
			'cabecera'	=> $cabecera,
		);
		$this->load->view('principal', $datos, false);
	}
}
