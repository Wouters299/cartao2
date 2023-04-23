<?php

    require('models/Model.php');
    require('models/Usuario.php');


    $nome = $_POST['nome'] ?? false;
    $datanasc = $_POST['datanasc'] ?? false;
    $curso = $_POST['idCurso'] ;
    $turma = $_POST['idTurma'] ;
    $cpf = $_POST['cpf'] ?? false;

   

    if(!$nome || !$datanasc || !$curso || !$turma || !$cpf){


        die;
    }

    $usr = new Aluno();
    $usr->update([
        'nome' => $nome,
        'datanasc' => $datanasc,
        'idCurso' => $curso,
        'idTurma' => $turma,
        'cpf' => $cpf,
    ],  $id);

    header('location:usuarios.php');
    die;