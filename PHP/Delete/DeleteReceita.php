<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$NomeR = $_GET['Nome'];
?>

<html>

<head>
  <title>Dados a deletar!</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../style.css">
</head>

<body class="page">
  <div class="main">
    <?php include("../menu.php"); ?>
    <div class="formdel">
      <fieldset>
        <legend>Deletar Dados</legend>
        <?php
        $result = mysqli_query(
          $ok,
          "select distinct nome 
              from receita 
              where nome ='$NomeR'
            "
        ) or die("Não é possível retornar dados do Receita!");
        $linha         = mysqli_fetch_array($result);
        $Nome        = $linha["nome"];


        print("<h3>Deletando receita <br><span>$Nome</span></h3><f>");
        ?>
        <a href='../Main/Index.php'>Cancelar e voltar</a>
        <form action="CDeleteReceita.php" method="get">
          <input type="hidden" name="cod_del" value="<?php print($Nome) ?>">
          <br>
          <input type="submit" value="Deletar Dados" class="save">
        </form>
      </fieldset>
    </div>
  </div>
</body>

</html>