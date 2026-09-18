# Hands on Work VII - versão PHP

Tecnologias: PHP 8+, MySQL, PDO, JSON, OpenAPI 3.0.3 e Swagger UI.

## Passos
1. Execute `sql/01_schema.sql` e `sql/02_seed.sql` no MySQL.
2. Ajuste usuário e senha em `src/config/config.php`.
3. Coloque a pasta em um servidor Apache/PHP (por exemplo, Apache24/htdocs ou XAMPP/htdocs).
4. Teste os endpoints:
   - `/public/api/pagamentos-por-imovel.php`
   - `/public/api/vendas-por-mes.php`
   - `/public/api/percentual-por-tipo.php`
5. Abra `public/docs/index.html` pelo servidor para acessar o Swagger UI.
6. Rode `php tests/testes.php` para testar o processamento funcional sem depender do banco.
