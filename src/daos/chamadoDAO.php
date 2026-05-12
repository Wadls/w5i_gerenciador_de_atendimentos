<?php 
    require_once "connectDAO.php";
    global $conn;

    // Buscando os Chamados
    // Usamos INNER JOIN para cruzar todos dados"
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

    // Busca no banco juntando as tabelas para pegar os nomes reais
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

    // Função que preenche a tabela de forma dinâmiva
    while ($linha = mysqli_fetch_assoc($dados)) {
        
        $id_chamado = $linha['id_chamado'];
        $setor = $linha['nome_setor'];
        // Juntamos o nome da prioridade com o tempo na mesma variável para economizar espaço na tela
        $prioridade = $linha['nome_prioridade'] . " (" . $linha['tempo_estimado'] . "h)"; 
        $status = $linha['status_chamado'];

        //Reset da variável null, pra parar de dar problema
        $horas = null;
        
        // Formatação de Datas: Se a data dentro do banco for NULL no banco, então mostro um traço "-". 
        // Se tiver data, prefiro o modelo padrão Brasileiro (Dia/Mês/Ano Hora:Minuto)
        $checkin = $linha['data_checkin'] ? date('d/m/Y H:i', strtotime($linha['data_checkin'])) : '-';
        $checkout = $linha['data_checkout'] ? date('d/m/Y H:i', strtotime($linha['data_checkout'])) : '-';
        $tempo_total = 0;
        //Salva-guarda, para garantir que o tempo só será contabilizado se existir data de check-in e check-out registrados
        if ($linha['data_checkin'] && $linha['data_checkout']) {
            
            // Converte as datas originais do banco para segundos (Unix Timestamp)
            $segundos_iniciais = strtotime($linha['data_checkin']);
            $segundos_finais = strtotime($linha['data_checkout']);
            
            // Subtrai um do outro para achar a diferença total em segundos
            $diferenca_segundos = $segundos_finais - $segundos_iniciais;
            
            // Converte os segundos em horas (1 hora = 3600 segundos)
            $horas = $diferenca_segundos / 3600;
            
            
            $h = floor($diferenca_segundos / 3600);
            
            // Pega o "resto" da divisão e transforma em minutos
            $m = floor(($diferenca_segundos % 3600) / 60);
            
            $tempo_total = "{$h}h {$m}m";
        }

        
       $botoes = "";
        //Botão de check-in
        if ($status == "Aberto") {
            $botoes .= "<a href='#' class='btn btn-success btn-sm me-1' data-bs-toggle='modal' data-bs-target='#modal_confirmar' 
                        onclick=\"prepararModal($id_chamado, 'check-in_chamado.php', 'Confirmar Check-in', 'Deseja realmente iniciar o atendimento do Chamado <b>#$id_chamado</b>?', 'btn-success')\">Check-in</a>";
        }
        //Botão de check-out
        if ($status == "Inicializado") {
            $botoes .= "<a href='#' class='btn btn-danger btn-sm me-1' data-bs-toggle='modal' data-bs-target='#modal_confirmar' 
                        onclick=\"prepararModal($id_chamado, 'check-out_chamado.php', 'Confirmar Check-out', 'Deseja realmente finalizar o Chamado <b>#$id_chamado</b>?', 'btn-danger')\">Check-out</a>";
        }
        //Botão de Cancelamento
        if ($status == "Aberto" || $status == "Inicializado") {
            $botoes .= "<a href='#' class='btn btn-warning btn-sm text-dark' data-bs-toggle='modal' data-bs-target='#modal_confirmar' 
                        onclick=\"prepararModal($id_chamado, '../script/cancelar_chamado_script.php', 'Cancelar Chamado', 'Tem certeza que deseja cancelar o Chamado <b>#$id_chamado</b>?', 'btn-warning')\">Cancelar</a>";
        }
        //Botão de +Detalhes
        $botoes .=" <a href='detalhes_chamado.php?id=$id_chamado' class='btn btn-primary btn-sm me-1'>+ Detalhes</a>";
        
        //Essa função compara o tempo estimado com o tempo e que a tarefa foi cumprida, em caso de prazo estourado a linha fica vermelha
        if (isset($horas) && $horas > $linha['tempo_estimado']) {
        $prazo_nao_cumprido ="class='table-danger'";
        }
        else {
            $prazo_nao_cumprido = "table-secondary";
        }
    
        // impressão das linhas da tabela
        echo "
            <tr $prazo_nao_cumprido>
                <th scope='row'>#$id_chamado</th>
                <td>$setor</td>
                <td>$prioridade</td>
                <td>$status</td>
                <td>$tempo_total</td>
                <td>$botoes</td>
            </tr>
        ";
    }
}

    
?>
