<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <?php
        require_once __DIR__ . '/daos/setorDAO.php'; 
        require_once __DIR__ . '/daos/prioridadeDAO.php'; 
    ?>
        
    <title>Cadastro</title>
  </head>
  <body>
    <div class= "container">
        <div class= "row">
            <div class= "column">
                <h1 class="display-4 fw-bold">Cadastro de Chamado</h1>
                <form action="cadastro_script.php" method="POST">
                    <div class="form-group">
                        <h3 class=" fw-bold" name="id-chamado"><?php echo"ID FIXO POR AQUI" ?></h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Setor: </label>
                        <select name="setor" id="setor">
                            <?php listar_setores($setores) ?>
                        </select>
                        <input
                            type="button"
                            class="btn btn-primary"
                            value="+ Adicionar novo setor..."
                            onclick="window.location.href='cadastro_setor.php';"
                        />
                        <label class="form-label">Prioridade: </label>
                        <select name="prioridade" id="prioridade">
                            <?php listar_prioridades($prioridades_TempoEstimado) ?>
                        </select>
                        <input
                            type="button"
                            class="btn btn-primary"
                            value="+ Adicionar nova prioridade..."
                            onclick="window.location.href='cadastro_prioridade.php';"
                        />
                        <button type="submit" class="btn btn-success">Enviar</button>    <!-- class= "btn btn-primary" -->
                        <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
