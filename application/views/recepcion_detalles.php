<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		table.detalles{
			margin: auto;
		}
	</style>
</head>
<body>
<?php
	if($pedidos){
		$this->table->set_heading(array('Item', 'Clientes', 'Estados', 'Opciones'));
		$this->table->add_row(array('No hay pedidos en la fecha'));

		foreach ($pedidos->result() as $row) {
			$this->table->add_row(array(

			));
		}


	}else{
		$this->table->add_row(array('No hay pedidos en la fecha'));
	}

	$this->table->set_template(array('table_open' => '<table class=detalles>'));
	echo $this->table->generate();
?>
</body>
</html>