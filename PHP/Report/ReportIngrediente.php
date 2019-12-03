<?php
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
        $resultado = mysqli_query(
          $ok,
          "
          Select * 
          from ingrediente
          order by nome
          "
        );

        while ($linha = mysqli_fetch_array($resultado)) {
          $Id      = $linha["ID_INGREDIENTE"];
          $Nome    = $linha["NOME"];
          $Unit    = $linha["UNIT"];
          $Reserva = $linha["RESERVA"];

          print("<tr>
          <td>$Id</td>");
          print("
          <td class='tl'>$Nome </td>");
          print("
          <td class='tl'>$Unit </td>");
          print("
          <td class='tr'>$Reserva </td>");
          print("<td><a href='../Change/ChangeIngrediente.php?Id=$Id'>Alterar</a></td>");
          print("<td><a href='../Delete/DeleteIngrediente.php?Id=$Id'>Deletar</a></td></tr>");
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>