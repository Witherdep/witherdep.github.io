<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "1234";
    $banco = "andes";
    $porta ="3305";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco,$porta);

    if (mysqli_connect_errno()){
        die("Conexão falhou: " . mysqli_connect_errno());
    }
?> 