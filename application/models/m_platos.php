<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_platos extends CI_Model {

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

	function get_platos($id_plato = false, $plato = false, $estado = false){
		if($id_plato)
			$this->db->where('id_plato', $id_plato);
		if($plato)
			$this->db->where('plato', $plato);
		if($estado)
			$this->db->where('estado', $estado);
		$platos 	= $this->db->get('platos');
		if($platos->result())
			return $platos;
		return false;
	}

	function insert_platos($plato, $cantidad, $estado){
		$this->db->order_by('id_plato', 'desc');
		$platos = $this->db->get('platos');
		if($platos->result()){
			$platos_ 	= $platos->row_array();
			$id_plato 	= $platos_['id_plato'] + 1;
		}else
			$id_plato 	= 1;

		$datos 	= array(
			'id_plato' 		=> $id_plato,
			'plato' 		=> $plato,
			'cantidad_sabor'=> $cantidad,
			'estado' 		=> $estado,
		);
		$this->db->insert('platos', $datos);
	}

	function delete_platos($id_plato = false){
		if($id_plato)
			$this->db->where('id_plato', $id_plato);
		$this->db->delete('platos');
	}

	function update_platos($id_plato = false, $estado){
		if($id_plato)
			$this->db->where('id_plato', $id_plato);
		$this->db->update('platos', array('estado' => $estado));
	}
}
