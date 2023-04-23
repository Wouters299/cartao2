<?php
require('pdo.inc.php');
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

  
    //cria aconsulta e aguarda os dados;
    $sql = $conex ->prepare('select * from alunos where nome = :name ');

//adiciona os dados na consulta

$sql->bindParam(':name', $nome);

$sql->execute();



if ($sql->rowCount()) {
        //echo "login feito com sucesso"

$nome  = $sql->fetch(PDO::FETCH_OBJ);

 

    
if($cpf == $nome->cpf){

          
    session_start();
    $_SESSION ['nome'] = $nome->nome;
    header('location:alunos.php');
    die;

    }}

    header('location:login_aluno.php?erro=1');
    die;
