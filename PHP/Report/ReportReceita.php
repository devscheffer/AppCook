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
          <th colspan=11>Receita</th>
        </tr>
        <tr>
          <th>Nome</th>
          <th>Porcao</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query(
          $ok,
          "select 
            NOME
            ,porcao
          from receita
          group by 
            NOME
            ,porcao
          "
        );
        while ($linha = mysqli_fetch_array($result)) {
          $Nome = $linha["NOME"];
          $Porcao = $linha["porcao"];


          print("<tr>
          <td>$Nome</td>");
          print("
          <td>$Porcao</td>");
          print("<td><a href='../Change/ChangeReceita.php?Nome=$Nome'>Alterar</a></td>");
          print("<td><a href='../Delete/DeleteReceita.php?Nome=$Nome'>Deletar</a></td></tr>");
        }
        ?>
      </tbody>
      </table>
  </div>
</body>

</html>