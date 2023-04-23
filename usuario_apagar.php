<?php


   require ('twig_carregar.php');
   require('pdo.inc.php');

   if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $id =$_POST['id'] ?? false;
      if($id)
      {  $sql = $conex->prepare('DELETE * FROM alunos  WHERE idAluno = ? ');
         $sql -> execute([$id]);
      }
         
      header('location:adms.php');
      die;
   }


   $id = $_GET['id'] ?? false;
   $sql = $conex->prepare('DELETE  FROM alunos WHERE idAluno = ? ');
   $sql -> execute([$id]);
   $alunos = $sql->fetch(PDO :: FETCH_ASSOC);


   echo $twig->render('usuario_apagar.html', ['aluno'=> $alunos,]);