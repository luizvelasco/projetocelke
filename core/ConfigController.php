<?php

namespace Core;

class ConfigController
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlParameter;
    private string $urlSlugController;
    private array $format;

    public function __construct()
    {
        echo "Carregar a página<hr>";
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->clearUrl();

            $this->urlArray = explode("/", $this->url);

            if (isset($this->urlArray[0])){
                $this->urlController = $this->slugController($this->urlArray[0]);
            } else {
                $this->urlController = "Home";
            }
        } else {
            echo "Acessa a página inicial"; 
            $this->urlController = "Home";
        }

        echo "Controller: {$this->urlController}<br>";
    }

    private function clearUrl()
    {
        // Eliminar as tags
        $this->url = strip_tags($this->url);

        // Eliminar espaços em branco
        $this->url = trim($this->url);

        // Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");
    }

    private function slugController($slugController)
    {
        // Converter para minusculo
        $this->urlSlugController = strtolower($slugController);

        // Converter espaço em branco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);

        // Converter a primeira letra de cada palavra para maiusuculo
        $this->urlSlugController = ucwords($this->urlSlugController);

        // REtirar espaco em branco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);

        return $this->urlSlugController;
    }
    
}