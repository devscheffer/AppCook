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
	$NameI   = $_POST['NameI'];
	$Unit    = $_POST['Unit'];
	$Reserva = $_POST['Reserva'];

	if (
		$NameI == ""
		or $Unit == ""
		or $Reserva   == ""
	)
		print("Faltou preencher algum campo...");
	else {		
		print("<div class='insert'>Inserindo Ingrediente: ");
		mysqli_query(
			$ok,
			"insert into 
				ingrediente (
					NOME 
					,UNIT
					,RESERVA
				) 
				values (
					'$NameI'
					,'$Unit'
					,'$Reserva'
			)"
		) or die("Não é possível inserir o ingrediente!");
		print("<span>$NameI</span> inserido com sucesso<br> <a href='..\Form\FormIngrediente.php'>Voltar</a></div>");
	}
	?>
</body>

</html>