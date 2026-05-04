-- Aviso, o banco de dados foi montado via MySql
CREATE DATABASE atendimentos_w5i;
USE atendimentos_w5i;


CREATE TABLE Setores (
    id_setor INT PRIMARY KEY AUTO_INCREMENT,
    nome_setor VARCHAR(100) NOT NULL
);

CREATE TABLE Prioridades (
    id_prioridade INT PRIMARY KEY AUTO_INCREMENT,
    nome_prioridade VARCHAR(50) NOT NULL,
    tempo_estimado DECIMAL(5,2)
);

CREATE TABLE Chamados (
    id_chamado INT PRIMARY KEY AUTO_INCREMENT,
    id_setor INT NOT NULL,
    id_prioridade INT NOT NULL,
    status_chamado ENUM('Aberto', 'Inicializado', 'Finalizado', 'Cancelado') DEFAULT 'Aberto' NOT NULL,
    
    #--Esses dados não são obrigatórios, pois estão diretamente relacionados as funções check-in e out, e não precisam ser declaradas junto com o chamado
    data_checkin DATETIME DEFAULT NULL,  -- Registra quando o técnico começou
    data_checkout DATETIME DEFAULT NULL, -- Registra quando o técnico terminou
    solucao TEXT DEFAULT NULL,           -- Espaço para descrever o que foi feito
    
    FOREIGN KEY (id_setor) REFERENCES Setores(id_setor),
    FOREIGN KEY (id_prioridade) REFERENCES Prioridades(id_prioridade)
) AUTO_INCREMENT = 1000;

-- Inserindo Valores Base
INSERT INTO Setores (nome_setor) VALUES ('RH'), ('Manutenção'), ('Diretoria');
INSERT INTO Prioridades (nome_prioridade, tempo_estimado) VALUES ('Alta', 4.00), ('Média', 24.00), ('Baixa', 72.00);

INSERT INTO Chamados (id_setor, id_prioridade, status_chamado, data_checkin, data_checkout, solucao) VALUES 
    (1, 1, 'Aberto', NULL, NULL, NULL), -- Chamado novo, sem datas ainda
    
    (2, 2, 'Inicializado', '2023-10-27 10:30:00', NULL, NULL), -- Já teve check-in, mas não checkout
    
    (3, 3, 'Finalizado', '2023-10-26 08:00:00', '2023-10-26 09:15:00', 'Troca de lâmpada e verificação de reator efetuada com sucesso.'); -- Completo