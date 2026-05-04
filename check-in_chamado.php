<?php
    // Pegamos o ID do chamado que veio pelo link do botão
    $id_chamado = $_GET['id'];
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Check-in do Chamado</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="display-6 fw-bold">Check-in - Chamado #<?php echo $id_chamado; ?></h2>
                <hr>
                
                <form action="check-in_script.php" method="POST">
                    <input type="hidden" name="id_chamado" value="<?php echo $id_chamado; ?>">
                    
                    <div class="form-group mb-4">
                        <label for="data_checkin" class="form-label">Data e Hora de Início:</label>
                        <input type="datetime-local" class="form-control" name="data_checkin" id="data_checkin" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Confirmar Check-in</button>
                    <a href="index.php" class="btn btn-secondary">Voltar</a>
                </form>

            </div>
        </div>
    </div>
  </body>
</html>