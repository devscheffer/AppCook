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

        <label for="Ing">Ingrediente: </label>
        <input type="text" list="ListIng" autocomplete="off" id="Ing" name="Ing">
        <datalist id="ListIng">
          <?php
          $resultado = mysqli_query(
            $ok,
            "select nome,id_ingrediente
              from ingrediente
            "
          ) or die("Nao e possivel consultar banco.");
          while ($row = mysqli_fetch_array($resultado)) {
            $Nome = $row["nome"];
            $Id = $row["id_ingrediente"];
            print("<option value='$Id'>$Nome</option>");
          }
          ?>
        </datalist>
        <br>

        <label for="Requerido">Requerido</label>
        <input type="number" name="Requerido" id="Requerido">
        <br>

        <input type="submit" value="Salvar" class="save">
      </form>
    </fieldset>

    <?php
      if(isset($_POST)){
        $NameR     = $_POST['NameR'];
        $NameI     = $_POST['Ing'];
        $Requerido = $_POST['Requerido'];
    if (
      $NameR == ""
      or $NameI == ""
      or $Requerido   == ""
    )
      print("Faltou preencher algum campo...");
    else {		
      mysqli_query(
        $ok,
        "insert into 
          receita (
            NOME 
            ,ID_INGREDIENTE
            ,REQUERIDO
          ) 
          values (
            '$NameR'
            ,'$NameI'
            ,'$Requerido'
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
          <th>Quantidade</th>
          <th>Ingrediente</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST)){
        $NameR   = $_POST['NameR'];
        $result = mysqli_query(
          $ok,
          "select 
            receita.NOME as nomer
            ,receita.REQUERIDO as req
            ,ingrediente.NOME as nomei
            ,id_receita
          from receita
          join ingrediente
          on receita.id_ingrediente = ingrediente.id_ingrediente
          where receita.NOME = '$NameR'
          "
        );
        while ($linha = mysqli_fetch_array($result)) {
          $NomeR = $linha["nomer"];
          $Req   = $linha["req"];
          $NomeI = $linha["nomei"];
          $Id = $linha["id_receita"];

          print("
          <td>$NomeR</td>");
          print("
          <td>$Req</td>");
          print("
          <td>$NomeI</td>");
          print("<td><a href='../Delete/DeleteChange.php?id=$Id'>Deletar</a></td></tr>");
        }
      }
        ?>
      </tbody>
      </table>
  </div>
</body>
</html>