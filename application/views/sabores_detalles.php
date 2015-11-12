<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
	
	<script>
		$('document').ready(function(){
			$('.eliminar').click(function(args) {
				id_sabor = this.id;
				if(confirm('Cormirmas la eliminación del sabor?')){
					$('#detalles').html('Cargando....');
					$.post('<?=base_url()?>index.php/sabores/eliminar', {txt_sabor : id_sabor}, function (respuesta) {
						$('#detalles').html(respuesta)
					});
				}
			})

			$('.deshabilitar').click(function(args) {
				$('#detalles').html('Cargando....');
				id_sabor = this.id;
				$.post('<?=base_url()?>index.php/sabores/cambiar_estado', {txt_sabor : id_sabor, slc_estado : 0}, function (respuesta) {
					$('#detalles').html(respuesta)
				});
			})

			$('.habilitar').click(function(args) {
				$('#detalles').html('Cargando....');
				id_sabor = this.id;
				$.post('<?=base_url()?>index.php/sabores/cambiar_estado', {txt_sabor : id_sabor, slc_estado : 1}, function (respuesta) {
					$('#detalles').html(respuesta)
				});
			})

		});
	</script>

	<style>
		table.detalles{
			margin: 10px auto;
		}
		
		 table.detalles td{
			padding: 5px 3px;
		}

		table.detalles ul{
			margin: 0px;
			padding: 0px;
			list-style: none;
		}

		table.detalles ul li{
			margin: 3px;
		}
		
		table.detalles ul li:hover{
			cursor: pointer;
		}

		table.detalles .eliminar,  table.detalles .deshabilitar,  table.detalles .habilitar{
			color: #bb0000;
			text-decoration: underline;
			cursor: pointer;
		}
	</style>
</head>

<body>
<?php
	if($sabores){
		$contador = 1;
		foreach($sabores->result() as $row){
			if($row->estado){
				$this->table->add_row(array(
					$contador,
					$row->sabor,
					array('data' => $row->ingrediente, 'style' => 'width:150px'),
					"<ul><li class=eliminar id=$row->id_sabor>Eliminar</li>" .
					"<li id=$row->id_sabor class=deshabilitar>Deshabilitar</li>"
				));
			}else{
				$this->table->add_row(array(
					$contador,
					$row->sabor,
					array('data' => $row->ingrediente, 'style' => 'width:150px'),
					"<ul><li><span id=$row->id_sabor class=eliminar>Eliminar</li>" .
					"<li id=$row->id_sabor class=habilitar>Habilitar</li>"
				));
			}
		}

		$this->table->set_heading('Item', 'Sabores', 'Ingredientes', 'Opciones');
	}else{
		$this->table->set_heading(array('No hay periodos registrado'));
	}

	$this->table->set_template(array('table_open' => '<table cellspacing= "0", border="1" class="detalles">'));
	echo $this->table->generate();
?>
</body>
</html>