<?php

require_once __DIR__ . '/../src/utils/RelatoriosFuncionais.php';
$dados = require __DIR__ . '/dados_mock.php';

function aprovado(bool $condicao, string $nome): void
{
    echo ($condicao ? '[APROVADO] ' : '[REPROVADO] ') . $nome . PHP_EOL;
    if (!$condicao) {
        exit(1);
    }
}

$porImovel = somarPagamentosPorImovel($dados);
$porMes = somarVendasPorMesAno($dados);
$porTipo = calcularPercentualPorTipo($dados);

aprovado(count($porImovel) === 8, '8 imóveis retornados');
aprovado($porImovel[0]['total_pagamentos'] === 26700.0, 'soma do imóvel 1');
aprovado($porMes[0]['total_vendas'] === 31200.0, 'total de janeiro/2026');
aprovado($porMes[5]['total_vendas'] === 18250.0, 'total de junho/2026');

$total = array_sum(array_column($porTipo, 'valor_total'));
$somaPercentuais = array_sum(array_column($porTipo, 'percentual'));
aprovado($total === 180500.0, 'valor total da série histórica');
aprovado(abs($somaPercentuais - 100.0) <= 0.02, 'percentuais somam aproximadamente 100%');

echo PHP_EOL . 'Todos os testes funcionais foram aprovados.' . PHP_EOL;
