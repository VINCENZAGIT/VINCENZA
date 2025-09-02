create database vincenza;

use vincenza;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL 
);

CREATE OR REPLACE VIEW view_usuarios AS
SELECT 
    id,
    nome,
    email
FROM usuarios;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255)
);
CREATE OR REPLACE VIEW view_clientes AS
SELECT 
    id,
    nome,
    email,
    telefone,
    endereco
FROM clientes;

CREATE TABLE carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    ano YEAR NOT NULL,
    placa VARCHAR(10) UNIQUE NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
);
CREATE OR REPLACE VIEW view_carros AS
SELECT 
    carros.id,
    carros.marca,
    carros.modelo,
    carros.ano,
    carros.placa,
    clientes.id AS cliente_id,
    clientes.nome AS cliente_nome,
    clientes.email AS cliente_email
FROM carros
JOIN clientes ON carros.cliente_id = clientes.id;
