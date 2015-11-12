<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
	
	<script>
		$('document').ready(function(){
			$('form').keypress(function(e){   
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

		//SABORES
		$txt_sabor = array(
			'type' 		=> 'text',
			'name'		=> 'txt_sabor',
			'id' 		=> 'txt_sabor',
			'value'		=> set_value('txt_sabor'),
			'size' 		=> '20',
			'maxlength'	=> '45',
		);
		
		$this->table->add_row(array(
			form_label('Sabor:', 'txt_sabor'),
			form_input($txt_sabor) .
			form_error('txt_sabor', '<div class=error>', '</div>')
		));

		//DESCRIPCION
		$txt_ingrediente = array(
			'type' 		=> 'text',
			'name'		=> 'txt_ingrediente',
			'id' 		=> 'txt_ingrediente',
			'value'		=> set_value('txt_ingrediente'),
			'size' 		=> '50',
			'maxlength'	=> '100',
		);
		
		$this->table->add_row(array(
			form_label('Ingrediente:', 'txt_ingrediente'),
			form_input($txt_ingrediente) .
			form_error('txt_ingrediente', '<div class=error>', '</div>')
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
		$this->table->set_caption('GESTIÓN DE SABORES');
		echo $this->table->generate();
		
		echo form_close();
	?>
</body>
</html>