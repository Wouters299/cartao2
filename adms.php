<?php

require('verifica_login_adm.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');


$usr = new Aluno();
$aluno= $usr->getAll();
$aluno=$usr->verifica_turma();
var_dump($turma);
echo $twig->render('usuarios.html', ['usuarios' => $aluno]);



