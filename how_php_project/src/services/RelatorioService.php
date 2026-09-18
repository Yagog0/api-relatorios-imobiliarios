<?php

class RelatorioService
{
    public function __construct(private ImovelRepository $repository) {}

    public function pagamentosPorImovel(): array
    {
        return somarPagamentosPorImovel($this->repository->listarTransacoesCompletas());
    }

    public function vendasPorMesAno(): array
    {
        return somarVendasPorMesAno($this->repository->listarTransacoesCompletas());
    }

    public function percentualPorTipo(): array
    {
        return calcularPercentualPorTipo($this->repository->listarTransacoesCompletas());
    }
}
