<?php

require('twig_carregar.php');

    $erro = $_GET['erro'] ?? FALSE;

echo $twig->render('login_adm.html', [
    'erro' => $erro
]);
