<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Index</title>
</head>

<body>

  <nav>
    <ul>
      <li>
        <a href='../Main/Index.php'>Home</a>
      </li>
      <li>
        <div class=" dropdown">
          <button class="dropbtn">Cadastrar
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../Form/FormIngrediente.php">Ingrediente</a>
            <a href="../Form/FormReceita.php">Receita</a>
          </div>
          </div>
      </li>
      <li>
        <div class="dropdown">
          <button class="dropbtn">Dados
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../Report/ReportIngrediente.php">Ingrediente</a>
            <a href="../Report/ReportReceita.php">Receita</a>
          </div>
        </div>
      </li>
      <li>
        <a href='../Report/ReportShoppingList.php'>Shopping list</a>
      </li>
    </ul>
  </nav>
</body>

</html>