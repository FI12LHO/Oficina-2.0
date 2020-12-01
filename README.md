# Oficina 2.0
### Getting started
Para executar o projeto, será necessário ter instalado:
- Composer: 1.10.13
- Laravel: 7x
- PHP: 7x
- MySQL
### Desenvolvimento
Para iniciar o projeto é necessario somente clonar o repositorio no diretorio escolhido.  
`$ cd "diretorio escolhido"`  
`$ git clone https://github.com/FI12LHO/Oficina-2.0.git`
### Construção  
- Crie o arquivo .env na raiz do projeto com base no exemplo (.env.example) e utilize o comando `$ php artisan key:generate`.
- Dentro da raiz do projeto utilize o comando `$ composer install`, para baixar todas as dependências necessarias no projeto Laravel.
- É necessario gerar o banco de dados SQL e executar as *migrations* através do comando `$ php artisan migrate`.
### Features
Este projeto é um CRUD construído com o framework __Laravel: 7x__, onde a principal função é o cadastro, edição e remoção de orçamentos.  
Ele demonstra de forma simples a validação e manipulação do banco de dados através do framework
