<?php

require('verifica_login_aluno.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');


$usr = new Aluno();
$aluno= $usr->getone();


echo $twig->render('cartao.html', ['usuarios' => $aluno]);



