<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <?php
        require_once __DIR__ . '/../daos/setorDAO.php'; 
        require_once __DIR__ . '/../daos/prioridadeDAO.php'; 
        require_once __DIR__ . '/../daos/chamadoDAO.php'; 
    ?>
        
    <title>Cadastro</title>
  </head>
  <body>
    <div class= "container">
        <div class= "row">
            <div class= "column">
                <h1 class="display-4 fw-bold">Cadastro de Chamado</h1>
                <form action="../script/chamado_script.php" method="POST">
                    <div class="form-group">
                        <hr>
                        <h3 class=" fw-bold" name="id-chamado">Chamado N°<?php echo ultimo_chamado(); ?></h3>
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
                        <br><br>
                        <label class="form-label">Prioridade: </label>
                        <select name="prioridade" id="prioridade">
                            <?php listar_prioridades($prioridades_Tempo_ID) ?>
                        </select>
                        <input
                            type="button"
                            class="btn btn-primary"
                            value="+ Adicionar nova prioridade..."
                            onclick="window.location.href='cadastro_prioridade.php';"
                        />
                        <br><br>
                        <button type="submit" class="btn btn-success">Enviar</button>    <!-- class= "btn btn-primary" -->
                        <a href="../../index.php" class="btn btn-primary">Voltar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    
  </body>
</html>
