<?php
    // 1. Puxamos a conexão com o banco
    require_once __DIR__ . '/daos/detalhesDAO.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Detalhes do Chamado #<?php echo $id_chamado; ?></title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                
                <div class="card shadow">
                    
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detalhes do Chamado #<?php echo $id_chamado; ?></h4>
                        <span class="badge bg-light text-dark fs-6"><?php echo $status; ?></span>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Setor Solicitante</h6>
                                <p class="fw-bold fs-5"><?php echo $setor; ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Prioridade (SLA)</h6>
                                <p class="fw-bold fs-5"><?php echo $prioridade; ?></p>
                            </div>
                        </div>

                        <div class="row mb-4 border-top pt-3">
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Data/Hora de Check-in</h6>
                                <p class="mb-0"><?php echo $checkin; ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted mb-1">Data/Hora de Check-out</h6>
                                <p class="mb-0"><?php echo $checkout; ?></p>
                            </div>
                        </div>

                        <div class="border-top pt-3">
                            <h6 class="text-muted mb-2">Descrição da Solução</h6>
                            <div class="p-3 bg-light rounded border">
                                <?php echo nl2br($solucao); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer text-end bg-white">
                        <a href="index.php" class="btn btn-secondary">Voltar para a Lista</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </body>
</html>