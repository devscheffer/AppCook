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
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>

<body class="page">
  <div class="main">
    <?php include("../menu.php"); ?>
    <?php
    $Id            = $_POST['id_ing'];
    $Nome_alter    = $_POST['Nome_alter'];
    $Unit_alter    = $_POST['Unit_alter'];
    $Reserva_alter = $_POST['Reserva_alter'];

    print("<div class='insert'>Alteração de ingrediente realizada:<p>");
    mysqli_query(
      $ok,
      "update ingrediente 
          set 
              NOME    = '$Nome_alter'
            , UNIT    = '$Unit_alter'
            , RESERVA = '$Reserva_alter'
          where ID_INGREDIENTE = '$Id'
        "
    ) or die("Não é possível alterar dados do ingrediente!");
    print("Dados de ingrediente <br><span>$Nome_alter</span><br> alterados com sucesso!<br> <a href='../Main/Index.php'>Voltar</a></div>");
    ?>
  </div>

</body>

</html>