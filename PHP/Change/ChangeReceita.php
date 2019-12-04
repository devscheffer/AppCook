<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$Nome1 = $_GET['Nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>

<body class="page">
  <div class="main">
    <?php include("../menu.php"); ?>

    <div class="form">
      <fieldset>
        <legend>Alterar Dados do Ingrediente</legend>
        <?php
        $result = mysqli_query(
          $ok,
          "Select distinct 
            nome
            ,porcao 
            from receita
            where nome ='$Nome1'
          "
        ) or die("Não é possível retornar dados do Ingrediente!");

        $linha   = mysqli_fetch_array($result);
        $Nome2    = $linha["nome"];
        $porcao    = $linha["porcao"];


        print("<h3>Receita <br><span>$Nome2</span> </h3><p>");
        ?>
        <a href='../Main/Index.php'>Cancelar e voltar</a>
        <br>

        <form action="CChangeReceita.php" method="post">
          
          <label for="NomeR">Nome da Receita:</label>
          <?php print("<br><span>$Nome2</span> ") ?>
          <input type="text" name="NomeR" value="<?php print($Nome2) ?>" id="NomeR ">
          <input type="hidden" name="NomeOld" value="<?php print($Nome2) ?>" id="NomeOld ">
          <br>

          <label for="porcao">Porcao:</label>
          <?php print("<br><span>$porcao</span> ") ?>
          <input type="numeric" name="porcao" value="<?php print($porcao) ?>" id="porcao ">
          <br>


          <input type="submit" value="Alterar Dados" class="save">
        </form>

      </fieldset>
    </div>
  </div>
</body>

</html>