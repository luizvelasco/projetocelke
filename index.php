<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <?php

        // Carregar o composer
        require './vendor/autoload.php';

        // Instanciar a classe ConfigController, responsável em tratar a URL
        $url = new Core\ConfigController;
        
        //Instanciar o método para carregar a página/controller
        $url->loadPage();
    ?>
</body>
</html>