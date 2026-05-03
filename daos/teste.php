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

$sql = "INSERT INTO Setores (nome_setor) VALUES 
        ('RH'), 
        ('Manutenção'), 
        ('Diretoria')";

// 3. Executamos o comando no banco
if (mysqli_query($conn, $sql)) {
    echo "✅ Sucesso! Os 3 setores foram adicionados ao banco de dados.";
} else {
    // Se algo der errado (ex: nome da tabela errado), ele avisa o motivo
    echo "❌ Erro ao adicionar: " . mysqli_error($conn);
}
?>