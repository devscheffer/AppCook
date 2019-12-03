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
  <title>Cadastro</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body class="page">

  <?php include("../menu.php"); ?>
  <div class="form">
    <fieldset>
      <a href='../Main/Index.php'>Cancelar</a>
      <legend>Cadastro de Receita</legend>
      <form method="post" action="">

        <label for="NameR">Nome da Receita: </label>
        <input type="text" name="NameR" id="NameR">
        <br>

        <label for="ing">Ingrediente: </label>
        <input type="text" list="Listing" autocomplete="off" id="ing" name="ing">
        <datalist id="Listing">
          <?php
          $result = mysqli_query(
            $ok,
            "select distinct 
              NOME
              ,UNIT
              from ingrediente
            "
          ) or die("Nao e possivel consultar banco.");
          while ($row = mysqli_fetch_array($result)) {
            $Nome = $row["NOME"];
            $Unit = $row["UNIT"];
            print("<option value='$Nome'>$Nome ($Unit)</option>");
          }
          ?>
        </datalist>
        <br>

        <label for="qtd">Quantidade</label>
        <input type="number" name="qtd" id="qtd">
        <br>

        <input type="submit" value="adicionar" class="save">
      </form>
    </fieldset>    
    
    <div class="main">

  <table class="table">
      <thead>
        <tr>
          <th colspan=11>Receita</th>
        </tr>
        <tr>
          <th>Receita</th>
          <th>Quantidade</th>
          <th>Ingrediente</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(isset($_POST["submit"])) {
        $NameR     = $_POST['NameR'];
        $result = mysqli_query(
          $ok,
          "select 
            receita.NOME
            ,ingrediente.NOME
            ,REQUERIDO
          from receita
          where receita = '$NameR'
          join ingrediente
          on ingrediente.id_ingrediente = receita.id_ingrediente
          "
        );

        while ($linha = mysqli_fetch_array($result)) {
          $qtd         = $linha["REQUERIDO"];
          $receita     = $linha["receita.NOME"];
          $ingrediente = $linha["ingrediente.NOME"];

          print("<tr>
          <td>$receita</td>");
          print("
          <td class='tl'>$qtd </td>");
          print("
          <td class='tl'>$ingrediente </td>");
          print("<td><a href='../Delete/DeleteChange.php?Nome=$receita',Ing = $ingrediente>Deletar</a></td></tr>");
        }
      }
        ?>
      </tbody>
      </table>
  </div>
  </div>
      }
</body>

</html>