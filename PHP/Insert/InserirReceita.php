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
	$NameR   = $_POST['NameR'];
	$NameI    = $_POST['Ing'];
	$Requerido = $_POST['Requerido'];

	if (
		$NameR == ""
		or $NameI == ""
		or $Requerido   == ""
	)
		print("Faltou preencher algum campo...");
	else {		
		print("<div class='insert'>Inserindo Ingrediente: ");
		mysqli_query(
			$ok,
			"insert into 
				receita (
					NOME 
					,ID_INGREDIENTE
					,REQUERIDO
				) 
				values (
					'$NameR'
					,'$NameI'
					,'$Requerido'
			)"
		) or die("Não é possível inserir a receita!");
		print("<span>$NameR</span> inserido com sucesso<br> <a href='..\Form\FormReceita.php'>Voltar</a></div>");
	}
	?>
</body>

</html>