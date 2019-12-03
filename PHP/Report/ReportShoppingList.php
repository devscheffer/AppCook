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
          <th colspan=11>Shopping List</th>
        </tr>
        <tr>
          <th>Nome</th>
          <th>Quantidade</th>
          <th>Unit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query(
          $ok,
          " 
          SELECT    
            ingrediente.nome as nome
            ,sum(receita.requerido)
            ,ingrediente.reserva
            ,(-1)*(ingrediente.reserva - sum(receita.requerido)) as sl
            ,ingrediente.UNIT as unit
          from receita
          join ingrediente
          on receita.ID_INGREDIENTE = ingrediente.ID_INGREDIENTE 
          where 
          receita.NOME in (SELECT nome from shopping_list)
          GROUP by ingrediente.nome
          having sl > 0  
          "
        );
        while ($linha = mysqli_fetch_array($result)) {
          $Ingrediente = $linha["nome"];
          $qtd_compra  = $linha["sl"];
          $unit        = $linha["unit"];

          print("<tr>
          <td>$Ingrediente</td>");
          print("
          <td class='tl'>$qtd_compra </td>");
          print("
          <td class='tl'>$unit </td>");
        }
        ?>
      </tbody>
      </table>
  </div>
</body>

</html>