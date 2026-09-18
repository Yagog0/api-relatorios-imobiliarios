USE hands_on_work_vii;

INSERT INTO tipo_imovel (id_tipo_imovel, nome_tipo) VALUES
(1, 'Apartamento'),
(2, 'Casa'),
(3, 'Terreno'),
(4, 'Sala Comercial');

INSERT INTO imovel (id_imovel, codigo_imovel, descricao_imovel, id_tipo_imovel) VALUES
(1, 'IMV-1001', 'Apartamento 2 quartos no Centro de Itajaí', 1),
(2, 'IMV-1002', 'Apartamento 3 quartos próximo à universidade', 1),
(3, 'IMV-2001', 'Casa com 2 quartos e garagem', 2),
(4, 'IMV-2002', 'Casa geminada em bairro residencial', 2),
(5, 'IMV-3001', 'Terreno de 360 m² em área urbana', 3),
(6, 'IMV-3002', 'Terreno de 500 m² próximo à rodovia', 3),
(7, 'IMV-4001', 'Sala comercial de 45 m² no Centro', 4),
(8, 'IMV-4002', 'Sala comercial de 70 m² em edifício empresarial', 4);

INSERT INTO pagamento (id_venda, data_pagamento, valor_pagamento, id_imovel) VALUES
(1, '2026-01-05', 4200.00, 1),
(2, '2026-01-09', 5300.00, 2),
(3, '2026-01-12', 3900.00, 3),
(4, '2026-01-18', 4100.00, 4),
(5, '2026-01-22', 6500.00, 5),
(6, '2026-01-28', 7200.00, 7),
(7, '2026-02-03', 4300.00, 1),
(8, '2026-02-07', 5400.00, 2),
(9, '2026-02-11', 3950.00, 3),
(10, '2026-02-16', 6600.00, 5),
(11, '2026-02-20', 6800.00, 6),
(12, '2026-02-25', 7350.00, 8),
(13, '2026-03-02', 4400.00, 1),
(14, '2026-03-08', 5500.00, 2),
(15, '2026-03-13', 4000.00, 4),
(16, '2026-03-17', 6700.00, 5),
(17, '2026-03-21', 6900.00, 6),
(18, '2026-03-29', 7450.00, 7),
(19, '2026-04-04', 4500.00, 1),
(20, '2026-04-10', 5600.00, 2),
(21, '2026-04-14', 4050.00, 3),
(22, '2026-04-19', 4150.00, 4),
(23, '2026-04-24', 7000.00, 6),
(24, '2026-04-27', 7550.00, 8),
(25, '2026-05-06', 4600.00, 1),
(26, '2026-05-11', 5700.00, 2),
(27, '2026-05-15', 4100.00, 3),
(28, '2026-05-20', 6800.00, 5),
(29, '2026-05-26', 7650.00, 7),
(30, '2026-06-03', 4700.00, 1),
(31, '2026-06-12', 5800.00, 2),
(32, '2026-06-21', 7750.00, 8);
