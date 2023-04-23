<?php

require('verifica_login_adm.php');
require('twig_carregar.php');
require('pdo.inc.php');


require('models/Model.php');
require('models/Usuario.php');

$id = $_GET['id']?? false;


$usr = new Aluno();
$info = $usr->getById($id);

//var_dump($id, $info);die;
 


echo $twig->render('usuario_ver.html', [], );