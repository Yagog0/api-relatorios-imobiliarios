CREATE DATABASE IF NOT EXISTS hands_on_work_vii
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE hands_on_work_vii;

DROP TABLE IF EXISTS pagamento;
DROP TABLE IF EXISTS imovel;
DROP TABLE IF EXISTS tipo_imovel;

CREATE TABLE tipo_imovel (
    id_tipo_imovel INT AUTO_INCREMENT PRIMARY KEY,
    nome_tipo VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE imovel (
    id_imovel INT AUTO_INCREMENT PRIMARY KEY,
    codigo_imovel VARCHAR(20) NOT NULL UNIQUE,
    descricao_imovel VARCHAR(255) NOT NULL,
    id_tipo_imovel INT NOT NULL,
    CONSTRAINT fk_imovel_tipo
        FOREIGN KEY (id_tipo_imovel)
        REFERENCES tipo_imovel(id_tipo_imovel)
);

CREATE TABLE pagamento (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    data_pagamento DATE NOT NULL,
    valor_pagamento DECIMAL(12,2) NOT NULL,
    id_imovel INT NOT NULL,
    CONSTRAINT fk_pagamento_imovel
        FOREIGN KEY (id_imovel)
        REFERENCES imovel(id_imovel)
);
