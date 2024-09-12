<?php
    session_start();
    
    if(!isset($_SESSION["login"])){
        
        session_destroy();    
        $msg = "Usuário sem acesso!";
        header("location:Parnaioca/index.php?msg=".$msg);
        
    }
    
    
    if($_SESSION["tempo"] + 10*60 < time()){
        session_destroy();    
        $msg = "Sessão expirada";
        header("location:Parnaioca/index.php?msg=".$msg);
    }else{
        $_SESSION["tempo"] = time();
    }   

    // criar uma tabela de telas e modulos e fazer a verificação se o usuaio tem acesso a essa tela aqui no arquivo de segurança