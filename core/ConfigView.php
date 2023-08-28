<?php

namespace Core;

if(!defined('C7E3L8K9E5')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Carregar as páginas da View
 * @author Velasco <luizvelasco@gmail.com>
 */
class ConfigView 
{
    
    /**
     * Receber o endereço da View e os dados.
     * @param string $nameView Endereço da View que deve ser carregada
     * @param array|string|null $data Dados que a View deve receber
     */
    public function __construct(private string $nameView, private array|string|null $data)
    {
        
    }

    /**
     * Carregar a View
     * Verificar se o arquivo existe, e carrega caso exista, não existindo para o carregamento
     *
     * @return void
     */
    public function loadView(): void
    {
        if (file_exists('app/' . $this->nameView . '.php')){
            include 'app/sts/Views/include/header.php';
            include ('app/' . $this->nameView . '.php');
            include 'app/sts/Views/include/footer.php';
        } else {
            die ("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador " . EMAILADM);
        }
    }
}