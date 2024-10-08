<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

echo $login = trim($_POST["login"]);

if (!empty($login)) {

    $sql = "select * from funcionarios where login = '{$login}'";
    $result = @mysqli_query($con, $sql);

    if (@mysqli_num_rows($result) == 1) {
        echo " Login já utilizado!";
    } else {
        echo " Login disponível!";
    }
    mysqli_close($con);
}
