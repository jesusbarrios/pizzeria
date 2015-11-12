<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SG</title>

	<style type="text/css">
		table.cabecera{
			margin: auto;
			border: solid 1px;
			padding: 20px;
		}

		table.cabecera caption{
			font-weight: bold;
			text-decoration: underline;
		}
	</style>
</head>
<body>
<?php
	$this->table->set_caption('RECEPCIÓN DE PEDIDOS');

	$txt_cliente 	= array(
		'type' 		=> 'text',
		'name'		=> 'txt_cliente',
		'id'		=> 'txt_cliente',
		'size'		=> 45,
		'maxlengt'	=> '20',
		'value'		=> set_value('txt_cliente'),
	);

	$btn_buscar 	= array(
		'type' 		=> 'button',
		'name'		=> 'btn_buscar',
		'id'		=> 'btn_buscar',
		'value'		=> 'Buscar',
	);

	$this->table->add_row(array(
		form_label('Cliente:', 'txt_cliente'),
		form_input($txt_cliente) . form_input($btn_buscar),
		form_error('txt_cliente', '<span class=error>', '</span>'),
	));

	$txt_telefono 	= array(
		'type' 		=> 'text',
		'name'		=> 'txt_telefono',
		'id'		=> 'txt_telefono',
		'size'		=> 15,
		'maxlengt'	=> '50',
		'value'		=> set_value('txt_telefono'),
	);

	$this->table->add_row(array(
		form_label('Teléfono:', 'txt_telefono'),
		form_input($txt_telefono),
		form_error('txt_telefono', '<span class=error>', '</span>'),
	));

	$slc_plato 	= array(''	=> '-----');
	if($platos)
		foreach ($platos->result() as $row)
			$slc_plato[$row->id_plato] = $row->plato;

	$this->table->add_row(array(
		form_label('Plato:', 'slc_plato'),
		form_dropdown('slc_plato', $slc_plato, set_value('slc_plato'), 'id=slc_plato'),
		form_error('slc_plato', '<span class=error>', '</span>'),
	));

	$slc_sabor1	= array(''	=> '-----');
	if($sabores)
		foreach ($sabores->result() as $row)
			$slc_sabor1[$row->id_sabor] = $row->sabor;

	$this->table->add_row(array(
		form_label('Sabor:', 'slc_sabor1'),
		form_dropdown('slc_sabor1', $slc_sabor1, set_value('slc_sabor1'),' id=slc_sabor1'),
		form_error('slc_sabor1', '<span class=error>', '</span>'),
	));

	$slc_sabor2	= array(''	=> '-----');
	if($sabores)
		foreach ($sabores->result() as $row)
			$slc_sabor2[$row->id_sabor] = $row->sabor;

	$this->table->add_row(array(
		form_label('Sabor:', 'slc_sabor2'),
		form_dropdown('slc_sabor2', $slc_sabor2, set_value('slc_sabor2'),' id=slc_sabor2'),
		form_error('slc_sabor2', '<span class=error>', '</span>'),
	));

	$btn_guardar 	= array(
		'type' 		=> 'submit',
		'name'		=> 'btn_guardar',
		'id'		=> 'btn_guardar',
		'value'		=> 'Guardar',
	);

	$this->table->add_row(array(
		false,
		form_input($btn_guardar),
		form_error('btn_guardar', '<span class=error>', '</span>'),
	));

	$this->table->add_row(array('data' => $detalles, 'colspan' => 2, 'class' => 'detalles'));

	$this->table->set_template(array('table_open' => '<table class=cabecera>'));
	echo $this->table->generate();
?>
</body>
</html>