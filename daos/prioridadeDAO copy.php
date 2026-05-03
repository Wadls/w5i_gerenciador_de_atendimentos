<?php 
    require_once "connectDAO.php";
    global $conn;//Minha IDE Está mostrando erro, toda vez que convoco a conexão de outro arquivo, então vou manter isso aqui

    $sql = "SELECT nome_prioridade, tempo_estimado FROM prioridades";
    $comando_sql = mysqli_query($conn, $sql);
    $prioridades = []; //Esse array vai servir para lógicas de programação com nomes
    $prioridades_TempoEstimado = []; //Esse array vai servir para colocar no formulário
    
    //Esse comando transforma o comando sql, em uma Lista de Nomes da Prioridade:
    foreach ($comando_sql as $key => $value) {
        array_push($prioridades_TempoEstimado,$value['nome_prioridade']." ".$value['tempo_estimado']."h");
        array_push($prioridades,$value['nome_prioridade']);
        
    }
    
    
    function listar_prioridades($lista) {
        foreach($lista as $prioridade){
            echo "<option value='$prioridade'>$prioridade</option>";
        }
    } //Você Precisa transferir isso para aba de prioridades
    
    function adicionar_prioridade($nova_prioridade, $tempo_estimado){
        global $conn, $prioridades;
        
        if (in_array($nova_prioridade,$prioridades)) {
            echo"<div class='alert alert-danger' role='alert'>A prioridade: <b>$nova_prioridade</b> já existe, tente de novo</div>";
        }
        else {
            // Inserindo o nome e o tempo (como tempo é número, não precisa de aspas simples nele)
            $sql = "INSERT INTO prioridades (nome_prioridade, tempo_estimado) VALUE ('$nova_prioridade', $tempo_estimado)";
            mysqli_query($conn, $sql);
            echo"<div class='alert alert-success' role='alert'>$nova_prioridade Cadastrada com sucesso!</div>";
        }       
    }
?>