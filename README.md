## Sobre o projeto

Consiste em uma API desenvolvida em Laravel 7 que deve ser utilizada em conjunto com seu outro repósitorio [Front end em VueJS](https://github.com/LucasVSCS/bank-frontend-vue). Utiliza o Laravel Passport para autenticação e tem como seu banco de dados o SQLite que em conjunto com as migrations e seeders formam a estrutura do banco.

## Funcionalidades

- Login/Logout.
- Retornar todos os dados da conta bancária e suas transações.
- Realizar o saque/depósito do dinheiro.

## Instalação

Para testar o projeto basta:

1. Realizar o clone do projeto.
2. Na pasta **database** do projeto, criar um arquivo vazio com o nome de **database.sqlite**.
3. Executar o comando **composer install**.
4. Gerar o arquivo **.env** a partir do **.env.example**.
5. Executar o comando **php artisan key:generate**.
6. Executar o comando **php artisan migrate** para gerar as tabelas utilizadas pela API.
7. Executar o comando **php artisan passport:install** para gerar as chaves de encriptação do sistema de auth.
8. Executar o comando **php artisan db:seed** para popular o banco de dados (Usuário: **admin@admin.com.br**, Senha: **admin**).
9. Executar o comando **php artisan serve** e acessar a API na porta 8000.

## Rotas

- [POST] /api/auth/login - Autenticação (Login).
- [POST] /api/auth/logout - Autenticação (Logout).
- [POST] /api/user/user-account - Retornar os dados da conta do usuário.
- [POST] /api/account/deposit-balance - Realizar o depósito de X valor.
- [POST] /api/account/withdraw-balance - Realizar o saque de X valor.
