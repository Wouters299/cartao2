<?php

require('twig_carregar.php');

    $erro = $_GET['erro'] ?? FALSE;

echo $twig->render('tela_inicial.html', [
    'erro' => $erro
]);

