<?php

require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/repositories/ImovelRepository.php';
require_once __DIR__ . '/utils/RelatoriosFuncionais.php';
require_once __DIR__ . '/services/RelatorioService.php';

function criarRelatorioService(): RelatorioService
{
    $config = require __DIR__ . '/config/config.php';
    $database = new Database($config);
    $repository = new ImovelRepository($database);
    return new RelatorioService($repository);
}

function responderJson(callable $acao): void
{
    header('Content-Type: application/json; charset=utf-8');

    try {
        http_response_code(200);
        echo json_encode($acao(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } catch (Throwable $erro) {
        http_response_code(500);
        echo json_encode([
            'erro' => 'Erro interno do servidor',
            'mensagem' => $erro->getMessage(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
