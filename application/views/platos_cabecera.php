<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
	
	<script>
		$('document').ready(function(){
			$('form').keypress(function(e){ 
			$('.error').hide('fast');
		    $('.ok').hide('fast');  
		    	if(e == 13)
		    		return false;
		    }).click(function(){
		    	$('.error').hide('fast');
		    	$('.ok').hide('fast');
		    });
		    
		    $('input[type=text]').keypress(function(e){
		    	if(e.which == 13)
		    		return false;
		    });
		});
	</script>

	<style>
		 table.cabecera{
			margin: auto;
			border: solid 1px;
			padding: 20px;
		}

		table.cabecera caption{
			font-weight: bold;
			text-decoration: underline;
		}

		table.cabecera td{
			vertical-align: top;
		}

		table.cabecera label{
			float: left;
			width: 100%;
			text-align: right;
		}

		table.cabecera .error{
			color: red;
			font-style: italic;
		}

	</style>
</head>

<body>
	<?php
//		$url = $base_url() . 'asignaturas/crear';
		echo form_open('');

		if($mensaje)
				$this->table->add_row(array('data' => $mensaje, 'colspan' => '2', 'class' => 'ok'));

		//PERIODO
		$txt_plato = array(
			'type' 		=> 'text',
			'name'		=> 'txt_plato',
			'id' 		=> 'txt_plato',
			'value'		=> set_value('txt_plato'),
			'size' 		=> '30',
			'maxlength'	=> '45',
		);
		
		$this->table->add_row(array(
			form_label('Plato:', 'txt_plato'),
			form_input($txt_plato) .
			form_error('txt_plato', '<div class=error>', '</div>')
		));

		//CANTIDAD
		$txt_cantidad = array(
			'type' 		=> 'text',
			'name'		=> 'txt_cantidad',
			'id' 		=> 'txt_cantidad',
			'value'		=> set_value('txt_cantidad'),
			'size' 		=> '1',
			'maxlength'	=> '1',
		);
		
		$this->table->add_row(array(
			form_label('Cantidad de sabores:', 'txt_cantidad'),
			form_input($txt_cantidad) .
			form_error('txt_cantidad', '<div class=error>', '</div>')
		));

		//BOTON GUARDAR
		$boton = array(
			'type' 	=> 'submit',
			'id' 	=> 'btn_guardar',
			'name' 	=> 'btn_guardar',
			'value' => 'Guardar',
		);

		$this->table->add_row(array(
			false,
			form_input($boton)
		));

		$this->table->add_row(array('data' => $detalles, 'colspan' => '2', 'id' => 'detalles'));

		$this->table->set_template(array('table_open' => '<table cellspacing= "0", border="0" class="cabecera">'));
		$this->table->set_caption('GESTIÓN DE PLATOS');
		echo $this->table->generate();
		echo form_close();
	?>
</body>
</html>