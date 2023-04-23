<?php
require('pdo.inc.php');
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    //cria aconsulta e aguarda os dados;
    $sql = $conex ->prepare('select * from adm where nome = :nome');

//adiciona os dados na consulta

$sql->bindParam(':nome', $nome);

$sql->execute();

//Se encontrou o usuário;

if ($sql->rowCount()) {
        //echo "login feito com sucesso"

$nome  = $sql->fetch(PDO::FETCH_OBJ);

    //verificar se a senha esta correta

    
if($senha == $nome->senha){

          
    session_start();
    $_SESSION ['nome'] = $nome->nome;
    header('location:adms.php');
    die;

    }}

    header('location:login_adm.php');
    die;
