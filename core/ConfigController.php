<?php

namespace Core;


/**
 * Recebe a URL e manipula
 * Carregar a CONTROLLER
 * 
 * @author Velasco <luizvelasco@email.com>
 */
class ConfigController extends Config
{
    /** @var string $url Recebe a URL do .htaccess*/
    private string $url;
    /** @var string $urlArray Recebe a URL convertida para array*/
    private array $urlArray;
    private string $urlController;
    // private string $urlParameter;
    private string $urlSlugController;
    private array $format;

    /**
     * Recebe a URL do .htaccess
     * VAlidar a URL
     */
    public function __construct()
    {
        $this->config();
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->clearUrl();

            $this->urlArray = explode("/", $this->url);

            if (isset($this->urlArray[0])){
                $this->urlController = $this->slugController($this->urlArray[0]);
            } else {
                $this->urlController = $this->slugController(CONTROLLERERRO);
            }
        } else {
            $this->urlController = $this->slugController(CONTROLLER);
        }

        echo "Controller: {$this->urlController}<br>";
    }

    /**
     * Método privado não pode ser instanciado fora da classe
     * Limpar a URL, eliminando as TAGs, os espaços em brancos, retirar a barra no final da URL e retirar os caracteres especiais
     *
     * @return void
     */
    private function clearUrl(): void
    {
        // Eliminar as tags
        $this->url = strip_tags($this->url);

        // Eliminar espaços em branco
        $this->url = trim($this->url);

        // Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");
    }

    /**
     * Converter o valor obtido da URL "sobre-empresa" e converter no formato da classe "SobreEmpresa".
     * Utilizado as funções para converter tudo para minísculo, converter o traço pelo espaço, converter cada letra da primeira palavra para maiúsculo, retirar os espaços em branco
     *
     * @param string $slugController Nome da classe
     * @return string Retorna a controller "sobre-empresa" convertido para o nome da classe "SobreEmpresa"
     */
    private function slugController(string $slugController): string
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

    /**
     * Carregar as Controllers
     * Instanciar as classe da controller e carregar o método index
     *
     * @return void
     */
    public function loadPage(): void
    {
        $classLoad = "\\Sts\\Controllers\\" . $this->urlController;
        $classPage = new $classLoad();
        $classPage->index();
    }
    
}