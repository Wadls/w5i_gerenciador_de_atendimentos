<?php 
    require_once "connectDAO.php";
    global $conn;//Minha IDE Está mostrando erro, toda vez que convoco a conexão de outro arquivo, então vou manter isso aqui

    $sql = "SELECT nome_setor FROM setores";
    $comando_sql = mysqli_query($conn, $sql);
    $setores = [];
    //Esse comando transforma o comando sql, em uma Lista de Nomes do Seto:
    foreach ($comando_sql as $key => $value) {
        array_push($setores,$value['nome_setor']);
    }
    sort($setores);
    
        function listar_setores($lista) {
            foreach($lista as $setor){
                echo "<option value='$setor'>$setor</option>";
            }
        } //Você Precisa Verificar o Retorno do tipo Value desse formulário depois
        function adicionar_setor($novo_setor){
            global $conn, $setores;
            if (in_array($novo_setor,$setores)) {
                echo"<div class='alert alert-danger' role='alert'>O setor: <b>$novo_setor</b> já existe, tente de novo</div>";
            }
            else {
                $sql = "INSERT INTO setores (nome_setor) VALUE ('$novo_setor')";
                mysqli_query($conn, $sql);
                echo"<div class='alert alert-success' role='alert'>$novo_setor Cadastrado com sucesso!</div>";
            }       
        }
       
    
    
