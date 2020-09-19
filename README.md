# Considerações

O repositório contém duas pastas: `backend` e `frontend`, onde cada uma tem isolado os respectivos códigos.

Logo abaixo tem os passos para subir cada uma das aplicações.

Será necessário abrir duas janelas do terminal, uma em cada respectiva pasta: frontend e backend.

## Setup initial BACKEND

Requisitos do sistema:

> Mysql 5.7.24

> Nginx 1.16

> php 7.2.19

> Laravel 6.2

Em um console, acesse a pasta **backend**

Execute os seguintes passos abaixo, em um console, após clonar esse repositório:

> composer install -vvv

> cp envvars\local.env .env

> php artisan key:generate

Agora, configure o arquivo `config/database.php` e defina o nome da base de dados.
Lembre-se que o usuário necessitará de acessos *root* para criar as tabelas.

> php artisan config:clear

> php artisan cache:clear

> php artisan migrate:install

> php artisan migrate

> php artisa l5-swagger:generate

Se ocorreu tudo bem, as tabelas foram criadas no banco definido.

Agora, execute o comando abaixo para criar o registros de acesso padrão.

> php artisan db:seed

Feito isso, execute o seguinte comando para subir o backend:

> php artisan serve --port=8082

### Documentação das APIS

O sistema foi construindo separando front-end e back-end, mesmo que ambos esteja
no mesmo repositório. 

Foi criado uma abstração que facilitará essa separação no futuro. 
A abstração foi feita em cima da classe: *App\MyClass\FactoryApis*

Url da documentação: `_DNS_BACKEND_/api/documentation`

## Setup initial FRONTEND

Requisitos do sistema:

> Node 12.*

> Npm 6.*

Agora, abra uma nova janela do seu console e acesse a pasta **frontend**... Tome o cuidado para que o último comando ainda continue rodando

Dentro do arquivo `config/dev.env.js`, tem a configuração `URL_API_BACKEND` com o valor setado `http://127.0.0.1:8082/`

Esse valor corresponde ao endereço do backend levantado na etapa de backend. Confirme se o endereço corresponde (a `/` no final é super importante).

Feito isso, execute os seguintes passos abaixo:

> npm install

> npm run dev

Agora vá ao navegador e acesse o sistema pela url gerada no comando anterior.

BOM PROVEITO!!!!
