<?php 
    require_once "connectDAO.php";
    global $conn; // Mantendo o seu padrão

    // 1. Buscando os Chamados
    // Usamos INNER JOIN para cruzar os dados. Em vez de ver "id_setor = 1", o PHP vai trazer "RH"
    $sql = "SELECT c.id_chamado, s.nome_setor, p.nome_prioridade, p.tempo_estimado 
            FROM Chamados c
            INNER JOIN Setores s ON c.id_setor = s.id_setor
            INNER JOIN Prioridades p ON c.id_prioridade = p.id_prioridade
            ORDER BY c.id_chamado DESC"; // O DESC faz o chamado mais novo (ex: 1005) aparecer primeiro
    
    $comando_sql = mysqli_query($conn, $sql);
    $lista_chamados = []; 
    
    function listar_chamados($lista) {
       
    } 
    function ultimo_chamado() {
        global $conn;
        $sql_ultimo = "SELECT MAX(id_chamado) as ultimo FROM Chamados";
        $res_ultimo = mysqli_query($conn, $sql_ultimo);
        $dados = mysqli_fetch_assoc($res_ultimo);
        $ultimo_id = $dados['ultimo'];
        return $ultimo_id + 1;
    } 
    
    function adicionar_chamado($id_setor, $id_prioridade){
    global $conn;
    
    // Status 'Aberto' entra pelo DEFAULT do banco, não precisa mandar no INSERT
    $sql = "INSERT INTO Chamados (id_setor, id_prioridade) VALUES ($id_setor, $id_prioridade)";
    
    if (mysqli_query($conn, $sql)) {
        $id_gerado = mysqli_insert_id($conn);
        echo "<div class='alert alert-success' role='alert'>Chamado <b>#$id_gerado</b> aberto com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Erro ao abrir chamado: " . mysqli_error($conn) . "</div>";
    }       
}
function listar() {
    global $conn;

    // 1. Fazemos a busca no banco juntando as tabelas para pegar os nomes reais
    $sql = "SELECT c.id_chamado, s.nome_setor, p.nome_prioridade, p.tempo_estimado, 
                   c.status_chamado, c.data_checkin, c.data_checkout 
            FROM Chamados c
            INNER JOIN Setores s ON c.id_setor = s.id_setor
            INNER JOIN Prioridades p ON c.id_prioridade = p.id_prioridade
            ORDER BY c.id_chamado DESC"; // Mostra os mais recentes primeiro

    $dados = mysqli_query($conn, $sql);

    // 2. Se não tiver nenhum chamado, exibe uma mensagem amigável
    if (mysqli_num_rows($dados) == 0) {
        echo "<tr><td colspan='7' class='text-center'>Nenhum chamado registrado.</td></tr>";
        return;
    }

    // 3. O seu laço de repetição (While) adaptado
    while ($linha = mysqli_fetch_assoc($dados)) {
        
        $id_chamado = $linha['id_chamado'];
        $setor = $linha['nome_setor'];
        // Juntamos o nome da prioridade com o tempo na mesma variável para economizar espaço na tela
        $prioridade = $linha['nome_prioridade'] . " (" . $linha['tempo_estimado'] . "h)"; 
        $status = $linha['status_chamado'];
        
        // Formatação de Datas: Se for NULL no banco, mostramos um traço "-". 
        // Se tiver data, convertemos para o padrão Brasileiro (Dia/Mês/Ano Hora:Minuto)
        $checkin = $linha['data_checkin'] ? date('d/m/Y H:i', strtotime($linha['data_checkin'])) : '-';
        $checkout = $linha['data_checkout'] ? date('d/m/Y H:i', strtotime($linha['data_checkout'])) : '-';

        // 4. Imprime a linha da tabela (<tr>) com os botões
        echo "
            <tr>
                <th scope='row'>#$id_chamado</th>
                <td>$setor</td>
                <td>$prioridade</td>
                <td>$status</td>
                <td>$checkin</td>
                <td>$checkout</td>
                <td>
                    <a href='editar_chamado.php?id=$id_chamado' class='btn btn-success btn-sm'>Editar</a>
                    
                    <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#modal_confirmar'
                    onclick=\"get_dados($id_chamado, 'Chamado #$id_chamado')\">Excluir</a>
                </td>
            </tr>
        ";
    }
}

    
    
?>
