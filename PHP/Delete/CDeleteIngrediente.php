<?php
$cod = $_GET['cod_del'];
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
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
	
		$resultado = mysqli_query(
			$ok,
			"
			Select 
				* 
				from 
					ingrediente 
				where 
					id_ingrediente ='$cod'
			"
		) or die("Nao e possivel consultar ingrediente.");


		mysqli_query(
			$ok,
			"delete from ingrediente 
				where id_ingrediente = '$cod';
			"
		) or die("Não  possível deletar ingrediente!");
		print("<div class='insert'><h3>ingrediente deletado com sucesso<br><span>(código): $cod </span></h3><a href='../Main/Index.php'>Voltar</a></div>");
		
	
		?>
</div>
</body>

</html>