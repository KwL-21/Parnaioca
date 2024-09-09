<?php
    session_start();
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]);
    
    
    include_once './conexao.php';

   echo $sql = "select * from funcionarios where 
            login = '{$login}' AND senha = '{$senha}'";
    
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) >= 1){
        $row = mysqli_fetch_array($result);
        $_SESSION["login"] = $row["login"]; 
        $_SESSION["perfil"] = $row["perfil"];
        $_SESSION["tempo"] = time();
        header("location:/Parnaioca/funcionarios/painel.php");
        
    }else{
        $msg = "Login/Senha invalido(s)";
        header("location:/Parnaioca/index.php?msg=".$msg);
    }

?>