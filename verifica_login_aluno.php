<?php
session_start();

if(!isset($_SESSION['nome'])){
    header('location:login_aluno.php?erro=2');
    die;
}