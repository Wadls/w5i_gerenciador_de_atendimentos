# W5i - Gerenciador de Atendimentos
**Repositório:** [https://github.com/Wadls/w5i_gerenciador_de_atendimentos](https://github.com/Wadls/w5i_gerenciador_de_atendimentos)

## 1. Descrição
Um sistema web para gerenciar o fluxo de chamados de suporte e solicitações internas, focado em simplicidade e usabilidade, construído com PHP, MySQL e Bootstrap.

### 1.1 Funcionalidades Gerais
* Criação de chamados vinculados a setores e prioridades.
* Gestão de status do chamado (Aberto, Inicializado, Finalizado e Cancelado).
* Registro de Check-in (início do atendimento) e Check-out (término do atendimento).
* Cálculo automático do tempo total gasto no atendimento.
* Validação de SLA: Comparação do tempo gasto com o tempo estimado da prioridade (com alertas visuais em caso de atraso).
* Criação e listagem de Setores.
* Criação e listagem de Prioridades (incluindo tempo estimado em horas).
* Aba de pesquisa rápida de chamados.
* Visualização detalhada de cada chamado, incluindo a descrição da solução adotada pelo técnico.
* Modais de confirmação dinâmicos para prevenir ações acidentais (Check-in, Check-out e Cancelamento).

## 2. Requisitos Funcionais do Sistema

### 2.1. Gestão de Chamados
* **RF01** – Permitir a abertura de um novo chamado associando-o a um setor e a uma prioridade.
* **RF02** – Listar todos os chamados na tela principal ordenados dos mais recentes para os mais antigos.
* **RF03** – Permitir realizar o Check-in (registrar data e hora de início e mudar status para "Inicializado").
* **RF04** – Permitir realizar o Check-out (registrar data e hora de término, adicionar a solução e mudar status para "Finalizado").
* **RF05** – Permitir o cancelamento de chamados que ainda não foram finalizados.
* **RF06** – Detalhar um chamado específico em uma página exclusiva, exibindo todas as datas e a solução cadastrada.

### 2.2. Setores e Prioridades
* **RF01** – Permitir o cadastro de novos setores de forma dinâmica.
* **RF02** – Permitir o cadastro de novas prioridades, definindo um tempo estimado (SLA) em horas para cada uma.
* **RF03** – Listar setores e prioridades nos formulários de criação de chamados.

### 2.3. Pesquisa e Relatórios
* **RF01** – Permitir a busca de chamados específicos através de uma barra de pesquisa.
* **RF02** – Calcular e exibir a diferença exata entre a data de check-in e check-out (ex: 2h 30m).

## 3. Requisitos Não Funcionais
* **RNF01** – O sistema deve possuir uma interface responsiva baseada em Bootstrap 5.
* **RNF02** – Exibição de mensagens de alerta claras (sucesso/erro) ao realizar ações no banco de dados.
* **RNF03** – Feedback visual rigoroso: Linhas da tabela devem mudar de cor dependendo da situação (ex: linhas vermelhas `table-danger` para chamados com prazo estourado).
* **RNF04** – Ações críticas (alterar status no banco) devem ser precedidas por um modal de confirmação no frontend.
* **RNF05** – O código backend deve seguir o princípio de Separação de Responsabilidades (arquivos visuais separados de regras de banco de dados/DAOs).

## 4. Tecnologias Utilizadas
* **Backend:** PHP (Procedural)
* **Banco de Dados:** MySQL
* **Frontend:** HTML5, CSS3, Bootstrap 5
* **Interatividade UI:** JavaScript Vanilla (utilizado pontualmente apenas para o controle do Modal dinâmico)
* **Arquitetura de Pastas:** Separação lógica entre `src` (telas), `daos` (conexão e queries) e `script` (processamento de dados).

## 5. Como rodar (local)

1. Faça o clone do repositório para a pasta pública do seu servidor local (ex: `htdocs` no XAMPP ou `www` no WAMP):
   ```bash
   git clone [https://github.com/Wadls/w5i_gerenciador_de_atendimentos.git](https://github.com/Wadls/w5i_gerenciador_de_atendimentos.git)
2. execute o código de criação do BD Cod_Criar_BD.sql
3. As configurações de conexão ao banco estão dentro da pasta daos, connectDAO.php