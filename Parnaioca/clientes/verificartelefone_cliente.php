<?php

echo $telefone = trim($_POST["telefene"]);

if (!empty($login)) {
    include_once './conexao.php';
    
    $sql = "select * from clientes where telefone = '{$telefone}'";
    $result = @mysqli_query($con, $sql);

    if (@mysqli_num_rows($result) == 1) {
        echo " Telefone indisponível!";
        
    } else {
        echo " Login disponível!";
    }
    mysqli_close($con);
}
