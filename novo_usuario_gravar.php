<?php

require('models/Model.php');
require('models/usuario.php');



$nome = $_POST['nome'] ?? false;
$datanasc = $_POST['datanasc'] ?? false;

$idCurso = $_POST['Idcurso'] ?? false;
$idTurma = $_POST['Idturma'] ?? false;
$cpf = $_POST['cpf'] ?? false;

echo($idCurso);
echo($idTurma);



if( !$nome || !$datanasc  ){
    header('location:novo_usuario.php');
    die;
}


$usr = new Aluno();
$usr->create([
'nome' => $nome,
'datanasc' =>$datanasc,
'idCurso' => $idCurso,
'idTurma' => $idTurma,
'cpf' => $cpf,
]);

header("location:adms.php");

