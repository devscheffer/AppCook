<html>

<head>
	<link rel="stylesheet" href="../style.css">
	<title>Ingrediente inserido!</title>
	<meta charset="UTF-8" />
</head>

<body class="page">
	<?php include("../menu.php"); ?>
	<?php
	$NameI     = $_POST['NameI'];
	$Unit = $_POST['Unit'];
	$Reserva   = $_POST['Reserva'];

	if (
		$NameI        == ""
		or $Unit == ""
		or $Reserva   == ""
	)
		print("Faltou preencher algum campo...");
	else {
		require("../conecta.inc.php");
		$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
		print("<div class='insert'>Inserindo Ingrediente: ");

		mysqli_query(
			$ok,
			"insert into 
				ingrediente (
					descricao 
					,unit
					,qtd_reserva
				) 
				values (
					'$NameI'
					,'$Unit'
					,'$Reserva'
			)"
		) or die("Não é possível inserir Ingrediente!");
		print("<span>$NameI</span> inserido com sucesso<br> <a href='../Main/Index.php'>Voltar</a></div>");
	}
	?>
</body>

</html>