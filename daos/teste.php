<?php
// $server = "localhost";
// $user = "root";
// $passw = "";
// $bd = "atendimentos_w5i";

// // Tentativa de conexão
// $conn = mysqli_connect($server, $user, $passw, $bd);

// // Checagem do status
// if (!$conn) {
//     // Se falhar, o 'die' para a execução e mostra o erro exato que o MySQL retornou
//     die("❌ Erro de conexão: " . mysqli_connect_error());
// } else {
//     // Se der certo, mostra a mensagem de sucesso
//     echo "✅ Sucesso! A conexão com o banco '{$bd}' está funcionando perfeitamente.";
// }

// // Fechando a conexão (boa prática após terminar o que precisava)
// mysqli_close($conn);

require_once "connectDAO.php";
global $conn;

// O primeiro valor é o id_setor e o segundo é o id_prioridade
$sql = "INSERT INTO Chamados (id_setor, id_prioridade) VALUES 
        (1, 1), -- Chamado para o RH (1) com prioridade Alta (1)
        (2, 2), -- Chamado para Manutenção (2) com prioridade Média (2)
        (3, 1); -- Chamado para Diretoria (3) com prioridade Alta(1)" ;

// Executamos o comando
if (mysqli_query($conn, $sql)) {
    // Como inserimos 3 de uma vez, o mysqli_insert_id vai mostrar o ID do PRIMEIRO deles
    $primeiro_id = mysqli_insert_id($conn);
    echo "✅ Sucesso! 3 chamados foram criados.";
    echo "<br>Eles começaram a partir do ID: " . $primeiro_id;
} else {
    echo "❌ Erro ao criar chamados: " . mysqli_error($conn);
}

?>