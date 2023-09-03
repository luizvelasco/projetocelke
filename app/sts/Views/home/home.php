<?php

// Redirecionar ou para o processamento quando o usuário não acesso o arquivo index.php
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

echo "<h1>Página Inicial</h1>";

extract($this->data[0]);

echo "ID: $id<br>";
echo "Título: $title_top<br>";
echo "Descrição: $description_top<br>";
echo "Link do Botão: $link_btn_top<br>";
echo "Texto do Botão: $txt_btn_top<br>";
echo "Nome da imagem: $image<br>";