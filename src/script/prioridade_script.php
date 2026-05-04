<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <title>Processando Prioridade</title>
  </head>
  <body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                   require_once __DIR__ . '/../daos/prioridadeDAO.php'; 
                   
                   $nova_prioridade = $_POST['nova_prioridade'];
                   $tempo_estimado = $_POST['tempo_estimado'];
                   
                   adicionar_prioridade($nova_prioridade, $tempo_estimado);
                   
                   //  echo "<pre>";
                   //  print_r($GLOBALS);
                   //  echo "</pre>";
                ?>
                
                <br>
                <a href="../../index.php" class="btn btn-primary mt-3">Voltar</a>
            </div>
        </div>
    </div>

  </body>
</html>