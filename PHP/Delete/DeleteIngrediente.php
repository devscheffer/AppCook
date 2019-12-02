<?php
$cod = $_GET['cod'];
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
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
          "select 
              * 
              from 
                ingrediente 
              where 
                id_ingrediente ='$cod'
            "
        ) or die("Não é possível retornar dados do amigo!");
        $linha         = mysqli_fetch_array($result);
        $id_ingrediente = $linha["id_ingrediente"];
        $NomeDesc         = $linha["descricao"];


        print("<h3>Deletando ingrediente <br><span>$NomeDesc</span></h3><f>");
        ?>
        <a href='../Main/Index.php'>Cancelar e voltar</a>
        <form action="CDeleteIngrediente.php" method="get">
          <input type="hidden" name="cod_del" value="<?php print($id_ingrediente) ?>">
          <br>
          <input type="submit" value="Deletar Dados" class="save">
        </form>
      </fieldset>
    </div>
  </div>
</body>

</html>