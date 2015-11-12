<!DOCTYPE html>
<html lang="en">
<head>

	<style>
	.submenu{
		font-size: 19px;
		font-weight: normal;
		list-style: none;
		width: 300px;
		margin: 0px 10px;
		padding: 0px;
	}

	.submenu a{
		margin: 0 10px;
		padding: 0;
		text-decoration: none;
	}

	.submenu a:hover{
		text-decoration: underline;
		cursor: pointer;
	}
	</style>
</head>
<body>
<span class=submenu>
<?php
	if($menu == 'pedidos'){
		echo "<a href=" . base_url() . "index.php/Usuario>Pedidos</a>";
		echo "<a href=" . base_url() . "index.php/pedidos/estados>Estados</a>";
		echo "<a href=" . base_url() . "index.php/pedidos/reportes>Reportes</a>";
	}
?>
</span>
</body>
</html>