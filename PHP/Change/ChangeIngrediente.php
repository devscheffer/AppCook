<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die("Não é possível conectar-se ao servidor.");
$Id = $_GET['Id'];
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
          "Select * 
            from Ingrediente
            where ID_INGREDIENTE ='$Id'
          "
        ) or die("Não é possível retornar dados do Ingrediente!");

        $linha   = mysqli_fetch_array($result);
        $Nome    = $linha["NOME"];
        $Unit    = $linha["UNIT"];
        $Reserva = $linha["RESERVA"];


        print("<h3>Ingrediente <br><span>$Nome</span> </h3><p>");
        ?>
        <a href='../Main/Index.php'>Cancelar e voltar</a>
        <br>

        <form action="CChangeIngrediente.php" method="post">
          
          <label for="id_ing">Id:</label>
          <?php print("<br><span>$Id</span> ") ?>
          <input type="hidden" name="id_ing" value="<?php print($Id) ?>" id="id_ing ">
          <br>

          <label for="Nome_alter">Ingrediente:</label>
          <?php print("<br><span>$Nome</span> ") ?>
          <input type="text" name="Nome_alter" value="<?php print($Nome) ?>" id="Nome_alter ">
          <br>


        

          <label for="Unit_alter">Unit:</label>
          <?php print("<br><span>$Unit</span> ") ?>
          <input type="text" list="ListUnit_alter" autocomplete="off" id="Unit_alter" name="Unit_alter" value="<?php print($Unit) ?>">
          <datalist id="ListUnit_alter">
          <?php
          $resultado = mysqli_query(
            $ok,
            "select unit
              from ingrediente
              group by unit
            "
          ) or die("Nao e possivel consultar banco.");
          while ($row = mysqli_fetch_array($resultado)) {
            $Unit1 = $row["unit"];
            print("<option value='$Unit1'>$Unit1</option>");
          }
          ?>
          </datalist>
          <br>

          <label for="Reserva_alter">Reserva:</label>
          <?php print("<br><span> $Reserva</span> ") ?>
          <input type="number" name="Reserva_alter" value="<?php print($Reserva) ?>" id="Reserva_alter">
          <br>

          <input type="submit" value="Alterar Dados" class="save">
        </form>

      </fieldset>
    </div>
  </div>
</body>

</html>