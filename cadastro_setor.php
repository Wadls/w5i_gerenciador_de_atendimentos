<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro</title>
  </head>
  <body>
    <div class= "container">
        <div class= "row">
            <div class= "column">
                <h1 class="display-4 fw-bold">Cadastro de novo setor</h1>
                <form action="setor_script.php" method="POST">
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" required>
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
