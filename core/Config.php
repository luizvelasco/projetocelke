<?php

namespace Core;

if(!defined('C7E3L8K9E5')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

abstract class Config 
{
    protected function config(): void
    {
       // URL do projeto
        define('URL', 'http://localhost/projetocelke/');
        define('URLADM', 'http://localhost/projetocelke/adm/');

        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');

        // Credenciais do banco de dados

        define('EMAILADM', 'luizvelasco@gmail.com');
    }
}