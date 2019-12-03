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
      <legend>Cadastro de Shopping List</legend>
      <form action="" method="post">

        <label for="NameR">Nome da Receita: </label>
        <input type="text" list="ListNameR" autocomplete="off" id="NameR" name="NameR">
        <datalist id="ListNameR">
          <?php
          $resultado = mysqli_query(
            $ok,
            "select distinct nome
              from receita
            "
          ) or die("Nao e possivel consultar banco.");
          while ($row = mysqli_fetch_array($resultado)) {
            $Nome = $row["nome"];
            print("<option value='$Nome'>$Nome</option>");
          }
          ?>
        </datalist>
        <br>

        <input type="submit" value="Salvar" class="save">
      </form>
    </fieldset>

    <?php
      if(isset($_POST)){
        $NameR     = $_POST['NameR'];
    if (
      $NameR == ""
    )
      print("Faltou preencher algum campo...");
    else {		
      mysqli_query(
        $ok,
        "insert into 
          shopping_list (
            NOME 
          ) 
          values (
            '$NameR'
        )"
      ) or die("Não é possível inserir a receita!");
    }
  }
    ?>
  <table class=" table">
      <thead>
        <tr>
          <th colspan=11>Receita</th>
        </tr>
        <tr>
          <th>Receita</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST)){
        $result = mysqli_query(
          $ok,
          "select 
            id_shopping_list
            ,nome
          from shopping_list
          "
        );
        while ($linha = mysqli_fetch_array($result)) {
          $NomeR = $linha["nome"];
          $Id = $linha["id_shopping_list"];
          print("
          <td>$NomeR</td>");
          print("<td><a href='../Delete/DeleteShoppingList.php?id=$Id'>Deletar</a></td></tr>");
        }
      }
        ?>
      </tbody>
      </table>
  </div>
</body>
</html>