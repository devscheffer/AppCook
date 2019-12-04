<?php 
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
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

	$Receita = new Receita();
	$Receita->setNameR($_POST['NameR']);
	$Receita->setNameI($_POST['Ing']);
	$Receita->setRequerido($_POST['Requerido']);


	if (
		$Receita->getNameR() == ""
		or $Receita->getNameI() == ""
		or $Receita->getRequerido()   == ""
	)
		print("Faltou preencher algum campo...");
	else {		
		print("<div class='insert'>Inserindo Ingrediente: ");
		$Receita->CreateReceita($Receita);
		print("<span>".$Receita->getNameR()."</span> inserido com sucesso<br> <a href='..\Form\FormReceita.php'>Voltar</a></div>");
	}
	?>
</body>

</html>