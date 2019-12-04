<?php 
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
include '..\Model\ClassIngrediente.php'
?>

<html>
<head>
	<link rel="stylesheet" href="../style.css">
	<title>Ingrediente inserido!</title>
	<meta charset="UTF-8" />
</head>

<body class="page">
	<?php include("../menu.php"); ?>
	<?php

	$ingrediente = new Ingrediente();
	$ingrediente->setNome($_POST['NameI']);
	$ingrediente->setUnit($_POST['Unit']);
	$ingrediente->setReserva($_POST['Reserva']);
	
	if (
		$ingrediente->getNome() == ""
		or $ingrediente->getUnit()  == ""
		or $ingrediente->getReserva()    == ""
	)
		print("Faltou preencher algum campo...");
	else {
		print("<div class='insert'>Inserindo Ingrediente: ");
		$ingrediente->CreateIngrediente($ingrediente);
		print("<span>".$ingrediente->getNome()."</span> inserido com sucesso<br> <a href='..\Form\FormIngrediente.php'>Voltar</a></div>");
	}
	?>
</body>

</html>