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
			Select * 
				from ingrediente 
				where id_ingrediente ='$Id'
			"
		) or die("Nao e possivel consultar ingrediente.");
		$linha         = mysqli_fetch_array($result);
        $Nome        = $linha["NOME"];

		mysqli_query(
			$ok,
			"delete from ingrediente 
				where id_ingrediente = '$Id';
			"
		) or die("Não  possível deletar ingrediente!");
		print("<div class='insert'><h3>ingrediente deletado com sucesso<br><span> $Id - $Nome  </span></h3><a href='../Main/Index.php'>Voltar</a></div>");
		?>
</div>
</body>
</html>