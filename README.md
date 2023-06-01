## API HACKCAIXA - Simulação de Emprestimos

<p align="justify">Esta é uma API que oferece serviços para simulação de empréstimo. Ela permite receber um envelope JSON contendo uma 
solicitação de simulação de empréstimo, consultar informações parametrizadas em uma tabela de banco de dados SQL 
Server, validar os dados de entrada com base nos parâmetros de produtos retornados no banco de dados, filtrar o 
produto adequado aos parâmetros de entrada, realizar os cálculos para os sistemas de amortização SAC e PRICE e 
retornar um envelope JSON contendo o nome do produto validado e o resultado da simulação, além de gravar este mesmo 
envelope JSON no Eventhub. A gravação no Eventhub permite a integração com a área de relacionamento com o cliente da 
empresa para execução de estratégias negociais com base na interação do cliente.</p>

## Funcionalidades

### POST /simulador

- Recebe um envelope JSON contendo uma solicitação de simulação de empréstimo. Os dados de entrada serão validados 
com base nos parâmetros de produtos retornados no banco de dados. Em seguida, será realizado o cálculo para os sistemas 
de amortização SAC e PRICE. O resultado da simulação será retornado em um envelope JSON, contendo o nome do produto 
validado e os valores calculados para os sistemas de amortização SAC e PRICE. Além disso, o envelope JSON será gravado 
no Eventhub para integração com a área de relacionamento com o cliente.

## Requisitos

Certifique-se de que seu ambiente atenda aos seguintes requisitos:

- PHP >= 8.1
- Laravel = 10.x
- Extensões PHP para SQL Server: 
  - ODBC Driver
  - PDO SQL SERVER Driver
- [Extensões PHP para Laravel](https://laravel.com/docs/10.x/deployment):
  - Ctype PHP Extension
  - cURL PHP Extension
  - DOM PHP Extension
  - Fileinfo PHP Extension
  - Filter PHP Extension
  - Hash PHP Extension
  - Mbstring PHP Extension
  - OpenSSL PHP Extension
  - PCRE PHP Extension
  - PDO PHP Extension
  - Session PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
- Eventhub (para gravação do envelope JSON)
- Composer

## Instalação

- Clone o projeto: [API_HACKCAIXA](https://github.com/rvalenter/hackcaixa)
- Instale as dependêcias do projeto: composer install
- Configure as informações de ambiente, arquivo ENV:
  - Renomear o arquivo .env.example para .env
  - incluir a senha de conxeção com o banco de dados: DB_PASSWORD
  - incluir a string de conexão com o Eventhub: EVENTHUB_STRING
  - Habilitar ou desabilitar a gravação do Eventhub: EVENTHUB_STORE (TRUE OU FALSE)
- Execute no terminal para servir o projeto:
  - Execução local: php artisan serve; ou
  - Docker: ./vendor/bin/sail up

## Uso

- Esta API possui apenas uma rota que deve ser acessada via verbo POST:
  - Se estiver executando localmente: http://localhost:8000/api/simulador
  - Caso esteja utilizando Docker: http://localhost/api/simulador
- As requisições devem conter:
  - Envelope no formato JSON com os dados: { "valorDesejado": 900.00, "prazo": 5 }
  - Cabeçalhos:
    - Content-Type: application/json
    - X-Requested-With: XMLHttpRequest

## Contribua com o projeto

Agradeço por sua contribuição com o projeto: [API HACKCAIXA_SIMULADOR_EMPRESTIMOS](https://github.com/rvalenter/hackcaixa).

## Licença
 
Este projeto está sob [MIT license](https://opensource.org/licenses/MIT).
