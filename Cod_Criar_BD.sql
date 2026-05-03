-- Cria o banco de dados e diz para o sistema usá-lo
CREATE DATABASE atendimentos_w5i;
USE atendimentos_w5i;

-- Criando as tabelas de listas dinâmicas
CREATE TABLE Setores (
    id_setor INT PRIMARY KEY AUTO_INCREMENT,
    nome_setor VARCHAR(100) NOT NULL
);

CREATE TABLE Prioridades (
    id_prioridade INT PRIMARY KEY AUTO_INCREMENT,
    nome_prioridade VARCHAR(50) NOT NULL,
    peso_prioridade INT
);

CREATE TABLE Status (
    id_status INT PRIMARY KEY AUTO_INCREMENT,
    nome_status VARCHAR(50) NOT NULL
);

-- Criando a tabela de Chamados que se conecta com as de cima
CREATE TABLE Chamados (
    id_chamado INT PRIMARY KEY AUTO_INCREMENT,
    id_setor INT NOT NULL,
    id_prioridade INT NOT NULL,
    id_status INT NOT NULL,
    tempo_estimado DECIMAL(5,2), -- Ex: 2.50 para 2h e meia
    -- Configurando as chaves estrangeiras (Foreign Keys)
    FOREIGN KEY (id_setor) REFERENCES Setores(id_setor),
    FOREIGN KEY (id_prioridade) REFERENCES Prioridades(id_prioridade),
    FOREIGN KEY (id_status) REFERENCES Status(id_status)
);
-- Inserindo Valores na Tabela de setores
INSERT INTO Setores (nome_setor) VALUES (('RH'), ('Manutenção'), ('Diretoria'));