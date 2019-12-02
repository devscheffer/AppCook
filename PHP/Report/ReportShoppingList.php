<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$resultado = mysqli_query(
  $ok,
  " 
    SELECT * 
    FROM ingrediente 
    WHERE (qtd_reserva - qtd_necessaria) < 0  
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
          <th colspan=11>Shopping List</th>
        </tr>
        <tr>
          <th>Nome</th>
          <th>Unit</th>
          <th>Quantidade</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
          $Ingrediente = $linha["descricao"];
          $qtd_compra         = $linha["qtd_reserva - qtd_necessaria"];

          print("<tr>
          <td>$Ingrediente</td>");
          print("
          <td class='tl'>$qtd_compra </td>");
          print("<td><a href='../Change/ChangeC.php?cod=$Ingrediente'>Alterar</a></td>");
          print("<td><a href='../Delete/DeleteC.php?cod=$Ingrediente'>Deletar</a></td></tr>");
        }
        ?>
      </tbody>
      </table>
  </div>
</body>

</html>