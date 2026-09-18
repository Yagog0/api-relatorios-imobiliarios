USE hands_on_work_vii;

-- Consulta solicitada no item 1(d).
-- Sem WHERE e sem GROUP BY: todos os registros seguem para o PHP.
SELECT
    p.id_venda,
    p.data_pagamento,
    p.valor_pagamento,
    i.id_imovel,
    i.codigo_imovel,
    i.descricao_imovel,
    t.id_tipo_imovel,
    t.nome_tipo AS tipo_imovel
FROM pagamento AS p
JOIN imovel AS i
    ON i.id_imovel = p.id_imovel
JOIN tipo_imovel AS t
    ON t.id_tipo_imovel = i.id_tipo_imovel
ORDER BY p.id_venda;
