<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$resultado = mysqli_query(
  $ok,
  "select 
    receita
    ,cooking
  from receita
  group by receita
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
          <th colspan=11>Receita</th>
        </tr>
        <tr>
          <th>Nome</th>
          <th>Cooking</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
          $Receita = $linha["receita"];
          $Cooking         = $linha["cooking"];

          print("<tr>
          <td>$Receita</td>");
          print("
          <td class='tl'>$Cooking </td>");
          print("<td><a href='../Change/ChangeC.php?cod=$Receita'>Alterar</a></td>");
          print("<td><a href='../Delete/DeleteC.php?cod=$Receita'>Deletar</a></td></tr>");
        }
        ?>
      </tbody>
      </table>
  </div>
</body>

</html>