<?php

namespace Sts\Controllers;

if(!defined('C7E3L8K9E5')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class Contato
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para View */
    private array|string|null $data;
    
    /**
     * Instanciar a classe responsável em carregar a View
     *
     * @return void
     */
    public function index()
    {
        $this->data = "Mensagem enviada com sucesso!";
        $loadView = new \Core\ConfigView("sts/Views/contato/contato", $this->data);
        $loadView->loadView();
    }
}