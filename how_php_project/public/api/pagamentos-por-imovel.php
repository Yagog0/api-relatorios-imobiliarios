<?php
require_once __DIR__ . '/../../src/bootstrap.php';

$service = criarRelatorioService();
responderJson(fn() => $service->pagamentosPorImovel());
