<?php

namespace Sts\Models;

use PDO;

// Redirecionar ou para o processamento quando o usuário não acesso o arquivo index.php
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class StsHome
{
    /**  @var array $data Recebe os registros do banco de dados */
    private array $data;

    /**  @var object $connection Recebe a conexão com o banco de dados */
    private object $connection;

    /**
     * Criar o array com dados da página home
     *
     * @return array Retorna as informações para página home
     */
    public function index(): array 
    {

        $viewHome = new \Sts\Models\helper\StsRead();
        $viewHome->exeRead("sts_homes_tops");
        $this->data = $viewHome->getResult();
        
        return $this->data;
    }
}