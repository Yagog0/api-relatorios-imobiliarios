<?php

function somarPagamentosPorImovel(array $dados): array
{
    $acumulado = array_reduce($dados, function (array $acc, array $item): array {
        $chave = (string) $item['id_imovel'];

        if (!isset($acc[$chave])) {
            $acc[$chave] = [
                'id_imovel' => (int) $item['id_imovel'],
                'codigo_imovel' => $item['codigo_imovel'],
                'total_pagamentos' => 0.0,
            ];
        }

        $acc[$chave]['total_pagamentos'] += (float) $item['valor_pagamento'];
        return $acc;
    }, []);

    $resultado = array_map(function (array $item): array {
        $item['total_pagamentos'] = round($item['total_pagamentos'], 2);
        return $item;
    }, array_values($acumulado));

    usort($resultado, fn(array $a, array $b) => $a['id_imovel'] <=> $b['id_imovel']);
    return $resultado;
}

function somarVendasPorMesAno(array $dados): array
{
    $acumulado = array_reduce($dados, function (array $acc, array $item): array {
        $data = substr((string) $item['data_pagamento'], 0, 10);
        [$ano, $mes] = explode('-', $data);
        $chave = $mes . '/' . $ano;

        $acc[$chave] = ($acc[$chave] ?? 0) + (float) $item['valor_pagamento'];
        return $acc;
    }, []);

    $resultado = array_map(
        fn(string $mesAno, float|int $total) => [
            'mes_ano' => $mesAno,
            'total_vendas' => round((float) $total, 2),
        ],
        array_keys($acumulado),
        array_values($acumulado)
    );

    usort($resultado, function (array $a, array $b): int {
        [$mesA, $anoA] = array_map('intval', explode('/', $a['mes_ano']));
        [$mesB, $anoB] = array_map('intval', explode('/', $b['mes_ano']));
        return ($anoA <=> $anoB) ?: ($mesA <=> $mesB);
    });

    return $resultado;
}

function calcularPercentualPorTipo(array $dados): array
{
    $totalGeral = array_reduce(
        $dados,
        fn(float $total, array $item) => $total + (float) $item['valor_pagamento'],
        0.0
    );

    if ($totalGeral === 0.0) {
        return [];
    }

    $porTipo = array_reduce($dados, function (array $acc, array $item): array {
        $tipo = $item['tipo_imovel'];
        $acc[$tipo] = ($acc[$tipo] ?? 0) + (float) $item['valor_pagamento'];
        return $acc;
    }, []);

    $resultado = array_map(
        fn(string $tipo, float|int $valor) => [
            'tipo_imovel' => $tipo,
            'valor_total' => round((float) $valor, 2),
            'percentual' => round(((float) $valor / $totalGeral) * 100, 2),
        ],
        array_keys($porTipo),
        array_values($porTipo)
    );

    usort($resultado, fn(array $a, array $b) => strcmp($a['tipo_imovel'], $b['tipo_imovel']));
    return $resultado;
}
