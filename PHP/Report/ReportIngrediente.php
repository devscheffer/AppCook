<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
include '..\Model\ClassIngrediente.php' 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style.css">
  <title>Report</title>
</head>

<body class="page">
  <div class="main">
    <?php include("../menu.php"); ?>

    <table class=" table">

      <thead>
        <tr>
          <th colspan=20>Ingrediente</th>
        </tr>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Unit</th>
          <th>Reserva</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $resultado = 
          mysqli_query(
            $ok,
            "
            Select * 
            from ingrediente
            order by nome
            "
          );
          $Ingrediente = new Ingrediente();
          $Ingrediente->ReadIngrediente($resultado);
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>