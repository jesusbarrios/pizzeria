<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sabores extends CI_Model {

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

	function get_sabores($id_sabor = false, $sabor = false, $estado = false){
		if($id_sabor)
			$this->db->where('id_sabor', $id_sabor);
		if($sabor)
			$this->db->where('sabor', $sabor);
		if($estado)
			$this->db->where('estado', $estado);
		$sabores 	= $this->db->get('sabores');
		if($sabores->result())
			return $sabores;
		return false;
	}

	function insert_sabores($sabor, $ingrediente, $estado){
		$this->db->order_by('id_sabor', 'desc');
		$sabores = $this->db->get('sabores');
		if($sabores->result()){
			$sabores_ 	= $sabores->row_array();
			$id_sabor 	= $sabores_['id_sabor'] + 1;
		}else
			$id_sabor 	= 1;

		$datos 	= array(
			'id_sabor' 		=> $id_sabor,
			'sabor' 		=> $sabor,
			'ingrediente'	=> $ingrediente,
			'estado' 		=> $estado,
		);
		$this->db->insert('sabores', $datos);
	}

	function delete_sabores($id_sabor = false){
		if($id_sabor)
			$this->db->where('id_sabor', $id_sabor);
		$this->db->delete('sabores');
	}

	function update_sabores($id_sabor = false, $estado){
		if($id_sabor)
			$this->db->where('id_sabor', $id_sabor);
		$this->db->update('sabores', array('estado' => $estado));
	}
}
