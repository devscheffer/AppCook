<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$resultado = mysqli_query(
  $ok,
  "Select 
    * 
    from 
      ingrediente
  "
);
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
          <th colspan=11>Ingrediente</th>
        </tr>
        <tr>
          <th>Cod</th>
          <th>Nome</th>
          <th>Unit</th>
          <th>Reserva</th>
          <th>Requerido</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
          $Cod = $linha["id_ingrediente"];
          $Nome         = $linha["descricao"];
          $Unit     = $linha["unit"];
          $Reserva         = $linha["qtd_reserva"];
          $Requerido         = $linha["qtd_necessaria"];

          print("<tr>
          <td>$Cod</td>");
          print("
          <td class='tl'>$Nome </td>");
          print("
          <td class='tl'>$Unit </td>");
          print("
          <td class='tr'>$Reserva </td>");
          print("
          <td class='tl'>$Requerido </td>");
          print("<td><a href='../Change/ChangeC.php?cod=$Cod'>Alterar</a></td>");
          print("<td><a href='../Delete/DeleteC.php?cod=$Cod'>Deletar</a></td></tr>");
        }
        ?>
      </tbody>
      </table>
  </div>
</body>

</html>