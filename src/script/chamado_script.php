<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <title>Processando Chamado</title>
  </head>
  <body>
    <div class="container mt-4">
        <?php
            require_once __DIR__ . '/../daos/chamadoDAO.php'; 
            
            // Puxa os IDs que vieram dos selects do formulário HTML
            $id_setor = $_POST['setor'];
            $id_prioridade = $_POST['prioridade'];
            
            // salvando chamado no banco
            adicionar_chamado($id_setor, $id_prioridade);
        ?>
        <br>
        <a href="../views/cadastro_chamado.php" class="btn btn-primary">Abrir outro chamado</a>
        <a href="../../index.php" class="btn btn-secondary">Voltar ao Início</a>
    </div>
  </body>
</html>