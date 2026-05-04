<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro de Prioridade</title>
  </head>
  <body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold">Cadastro de nova prioridade</h1>
                
                <form action="../script/prioridade_script.php" method="POST">
                    
                    <div class="form-group mb-3">
                        <label for="nova_prioridade" class="form-label">Nome da Prioridade (ex: Altíssima): </label>
                        <input type="text" class="form-control" name="nova_prioridade" id="nova_prioridade" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="tempo_estimado" class="form-label">Tempo Estimado (em horas, ex: 4.50): </label>
                        <input type="number" step="0.01" min="0" class="form-control" name="tempo_estimado" id="tempo_estimado" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Enviar</button>   
                        <a href="cadastro_chamado.php" class="btn btn-primary">Voltar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
  </body>
</html>