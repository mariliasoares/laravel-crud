<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre
    
CRUD realizado durante o processo seletivo de estágio da Startup RBarcos. Construido com as tecnologias Laravel, PHP 7.3.5, MySQL. O Laravel é um framework de aplicação web com sintaxe expressiva e elegante. Tira a dor do desenvolvimento, facilitando tarefas comuns usadas em muitos projetos da web. Laravel é acessível, poderoso e fornece ferramentas necessárias para aplicativos grandes e robustos.

## Config
    
    Tecnologias necessarias:
    * Composer
    * Laravel
    * MySQL
    * PHP 7.3.5

## Run Project
    
    Voce deve ter como pre-requisito um database criado, com o nome 'crud'.
    $ create database crud;
    
    * Clone ou baixe este repositório:
    $ git clone https://github.com/mariliasoares/laravel-crud
    
    * acesse o diretorio
    
    * Install dependencies (More information -> https://getcomposer.org/download/)
    composer install
    
    # Create file .env
    cp .env.example .env

    !IMPORTANT -> Modify .env with your credencials database
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crud
    DB_USERNAME=<your_user_name>
    DB_PASSWORD=<your_password>
    
    # Generate key
    php artisan key:generate

    * Run migrations (tables)
    php artisan migrate
    
    * Dentro do diretorio do projeto executar:
    php artisan serve

    * Para testar, utilize o software de sua preferência (VS Code, por exemplo) e acesse: http://localhost:8000/boats
