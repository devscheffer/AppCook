<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$Id = $_GET['Id'];
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
          "select * 
              from ingrediente 
              where id_ingrediente ='$Id'
            "
        ) or die("Não é possível retornar dados do ingrediente!");
        $linha         = mysqli_fetch_array($result);
        $Nome        = $linha["NOME"];


        print("<h3>Deletando ingrediente <br><span>$Nome</span></h3><f>");
        ?>
        <a href='../Main/Index.php'>Cancelar e voltar</a>
        <form action="CDeleteIngrediente.php" method="get">
          <input type="hidden" name="cod_del" value="<?php print($Id) ?>">
          <br>
          <input type="submit" value="Deletar Dados" class="save">
        </form>
      </fieldset>
    </div>
  </div>
</body>

</html>