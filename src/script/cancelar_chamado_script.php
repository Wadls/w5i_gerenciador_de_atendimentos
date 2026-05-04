<?php
require_once __DIR__ . '/../daos/cancelamentoDAO.php'; 
$id_chamado = $_GET['id'];

cancelar_chamado($id_chamado);

// Redireciona o usuário de volta para o index
header("Location: ../../index.php");
exit; // Pausa o script para garantir o redirecionamento
?>