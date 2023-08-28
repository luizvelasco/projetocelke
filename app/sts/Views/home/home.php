<?php

// Redirecionar ou para o processamento quando o usuário não acesso o arquivo index.php
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

echo "View da página home<br>";

var_dump($this->data);