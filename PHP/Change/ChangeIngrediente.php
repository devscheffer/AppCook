<?php
$Cod = $_GET['cod'];
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
          "Select 
            * 
            from 
              Ingrediente
            where
              id_ingrediente ='$Cod'
            "
        ) or die("Não é possível retornar dados do Ingrediente!");

        $linha         = mysqli_fetch_array($result);
        $id_ingrediente = $linha["id_ingrediente"];
        $descricao = $linha["descricao"];
        $unit         = $linha["unit"];
        $qtd_reserva     = $linha["qtd_reserva"];


        print("<h3>Ingrediente <br><span>$descricao</span> </h3><p>");
        ?>
        <a href='../Main/Index.php'>Cancelar e voltar</a>
        <br>

        <form action="CChangeIngrediente.php" method="post">
          
          <label for="Id_ingrediente">Codigo:</label>
          <?php print("<br><span>$id_ingrediente</span> ") ?>
          <input type="hidden" name="Id_ingrediente" value="<?php print($id_ingrediente) ?>" id="Id_ingrediente ">
          <br>

          <label for="Desc_alter">Ingrediente:</label>
          <?php print("<br><span>$descricao</span> ") ?>
          <input type="text" name="Desc_alter" value="<?php print($descricao) ?>" id="Desc_alter ">
          <br>

          <label for="unit_alter">unit:</label>
          <?php print("<br><span>$unit</span> ") ?>
          <input type="text" name="unit_alter" value="<?php print($unit) ?>" id="unit_alter">
          <br>

          <label for=" Reserva_alter">Reserva:</label>
          <?php print("<br><span> $qtd_reserva</span> ") ?>
          <input type="number" name="Reserva_alter" value="<?php print($qtd_reserva) ?>" id="Reserva_alter">
          <br>

          <input type="submit" value="Alterar Dados" class="save">
        </form>

      </fieldset>
    </div>
  </div>
</body>

</html>