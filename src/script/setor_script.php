<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro</title>
  </head>
  <body>
    <div class= "container">
        <div class= "row">
            <?php
               require_once __DIR__ . '/../daos/setorDAO.php'; 
              $novo_setor = $_POST['novo_setor'];
              adicionar_setor($novo_setor);
                
            ?>
            <a href="../../index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

  </body>
</html>
