<?php
    require_once "connectDAO.php";
    global $conn;

    //Pegando o ID da URL. O isset verifica se o ID realmente foi passado.
    $id_chamado = isset($_GET['id']) ? $_GET['id'] : 0;

    //Esse comando realiza a busca de TODOS os dados
    $sql = "SELECT c.id_chamado, s.nome_setor, p.nome_prioridade, p.tempo_estimado, 
                   c.status_chamado, c.data_checkin, c.data_checkout, c.solucao
            FROM Chamados c
            INNER JOIN Setores s ON c.id_setor = s.id_setor
            INNER JOIN Prioridades p ON c.id_prioridade = p.id_prioridade
            WHERE c.id_chamado = $id_chamado";

    $resultado = mysqli_query($conn, $sql);
    $chamado = mysqli_fetch_assoc($resultado);

    //Segurança: Por precaução se o usuário digitar um ID inventado na URL, avisamos que não existe
    if (!$chamado) {
        die("<div class='container mt-5'><h2>Chamado não encontrado!</h2><a href='index.php' class='btn btn-primary'>Voltar</a></div>");
    }

    //Organização e formatação as variáveis para a tela
    $setor = $chamado['nome_setor'];
    $prioridade = $chamado['nome_prioridade'] . " (" . $chamado['tempo_estimado'] . "h)";
    $status = $chamado['status_chamado'];
    
    // Datas: Se for NULL, mostra uma mensagem amigável no lugar
    $checkin = $chamado['data_checkin'] ? date('d/m/Y H:i', strtotime($chamado['data_checkin'])) : '<i>Ainda não iniciado</i>';
    $checkout = $chamado['data_checkout'] ? date('d/m/Y H:i', strtotime($chamado['data_checkout'])) : '<i>Ainda não finalizado</i>';
    
    // Solução
    $solucao = $chamado['solucao'] ? $chamado['solucao'] : '<i>Nenhuma solução registrada ainda.</i>';