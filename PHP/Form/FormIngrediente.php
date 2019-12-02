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
  <title>Cadastro de Ingrediente</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body class="page">

  <?php include("../menu.php"); ?>
  <div class="form">
    <fieldset>
      <a href='../Main/Index.php'>Cancelar</a>
      <legend>Cadastro de Ingrediente</legend>
      <form action="../Insert/InserirIngrediente.php" method="post">
        <label for="NameI">Nome do Ingrediente: </label>
        <input type="text" name="NameI" id="NameI">
        <br>
        <label for="Unit">Unit: </label>
        <input type="text" list="ListUnit" autocomplete="off" id="Unit" name="Unit">
        <datalist id="ListUnit">
          <?php
          $resultado1 = mysqli_query(
            $ok,
            "select unit
              from ingrediente
              group by unit
            "
          ) or die("Nao e possivel consultar banco.");
          while ($row = mysqli_fetch_array($resultado1)) {
            $Unit1 = $row["unit"];
            print("<option value='$Unit1'>$Unit1</option>");
          }
          ?>
        </datalist>
        <br>
        <label for="Reserva">Reserva</label>
        <input type="number" name="Reserva" id="Reserva">
        <br>
        <input type="submit" value="Salvar" class="save">
      </form>
    </fieldset>
  </div>

</body>

</html>