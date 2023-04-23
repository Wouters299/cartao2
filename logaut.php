<?php

    session_start();
    session_destroy();

    header('location:tela_inicial.php');
    die;