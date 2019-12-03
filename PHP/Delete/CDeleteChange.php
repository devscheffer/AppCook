<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$Id = $_GET['cod_del'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../style.css">
	<title>Document</title>
</head>

<body class="page">
<div class="main">
	
		<?php include("../menu.php"); ?>
		<?php
	
		$result = mysqli_query(
			$ok,
			"
			select 
				receita.NOME as nomer
				,receita.REQUERIDO as req
				,ingrediente.NOME as nomei
				,id_receita
			from receita
			join ingrediente
			on receita.id_ingrediente = ingrediente.id_ingrediente
			where id_receita = '$Id'
			"
		) or die("Nao e possivel consultar ingrediente.");
		$linha         = mysqli_fetch_array($result);
        $Nome        = $linha["nomei"];

		mysqli_query(
			$ok,
			"delete from receita 
				where id_receita = '$Id';
			"
		) or die("Não  possível deletar ingrediente!");
		print("<div class='insert'><h3>ingrediente deletado com sucesso<br><span> $Id - $Nome  </span></h3><a href='../Form/FormReceita.php'>Voltar</a></div>");
		?>
</div>
</body>
</html>