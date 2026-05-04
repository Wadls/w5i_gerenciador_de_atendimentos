<?php

require_once __DIR__ . '/daos/chamadoDAO.php';
global $conn;


if (isset($_GET['id'])) {
    $id_chamado = $_GET['id']; //Aqui eu coleto o id
    
    $sql = "UPDATE Chamados SET status_chamado = 'Cancelado' WHERE id_chamado = $id_chamado"; //E utilizo ele para modificar o valor
    
    mysqli_query($conn, $sql);
}

// Redireciona o usuário de volta para a página onde a tabela fica 
header("Location: index.php");
exit; // Pausa o script para garantir o redirecionamento
?>