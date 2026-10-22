# API de relatórios imobiliários

API REST em PHP e MySQL desenvolvida no Hands on Work VII da Univali. Consulta transações imobiliárias e produz relatórios com agrupamentos e cálculos em memória.

## Relatórios
| Endpoint | Resultado |
| --- | --- |
| `/api/pagamentos-por-imovel.php` | Total acumulado de pagamentos por imóvel |
| `/api/vendas-por-mes.php` | Totais de vendas por mês e ano |
| `/api/percentual-por-tipo.php` | Percentuais por tipo de imóvel |

## Tecnologias
PHP 8+, PDO MySQL, MySQL, JSON, OpenAPI 3.0.3 e Swagger UI.

## Executar localmente
```bash
git clone https://github.com/Yagog0/api-relatorios-imobiliarios.git
cd api-relatorios-imobiliarios/how_php_project
```

1. Prepare o MySQL e a extensão `pdo_mysql` no PHP.
2. Em um banco de desenvolvimento, execute `sql/01_schema.sql` e `sql/02_seed.sql`. O primeiro script recria tabelas do projeto.
3. Ajuste as credenciais em `src/config/config.php`.
4. Inicie o servidor:

```bash
php -S localhost:8000 -t public
```

Exemplo de consulta: `http://localhost:8000/api/pagamentos-por-imovel.php`.

## Documentação da API
O contrato está em [docs/openapi.yaml](how_php_project/docs/openapi.yaml).

Para servir a interface Swagger com acesso ao contrato no caminho relativo atual, execute, na pasta `how_php_project`:

```bash
php -S localhost:8001
```

Abra `http://localhost:8001/public/docs/index.html`. Nesse modo, os endpoints estão sob `/public/api/`. O contrato possui uma URL de servidor de exemplo; ajuste-a ao seu ambiente para executar chamadas pela interface.

## Testes do processamento
Na pasta `how_php_project`:

```bash
php tests/testes.php
```

Esses testes usam dados de exemplo e não dependem do banco. A existência do comando não significa que os testes foram executados nesta revisão da documentação.

## Organização
| Pasta | Responsabilidade |
| --- | --- |
| `public/api/` | Endpoints JSON |
| `src/repositories/` | Consulta de transações |
| `src/services/` | Coordenação dos relatórios |
| `src/utils/` | Funções de agrupamento e cálculo |
| `sql/` | Estrutura, dados e consulta de exemplo |
| `tests/` | Validação com dados de exemplo |

Este projeto precisa de um ambiente PHP/MySQL; GitHub Pages não executa a API.

Desenvolvido por [Yago Maba](https://github.com/Yagog0).
