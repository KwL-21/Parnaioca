<?php
include('../config/conexao.php');
include('../../login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION["perfil"] == "u") {
    header("Location: ../../funcionarios/include/painel.php");
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>

<body>

    <?php

    $idacomodacoes = $_GET["IDacomodacoes"];


    $sql = "delete from acomodacoes where idacomodacoes = " . $idacomodacoes;

    if (mysqli_query($con, $sql)) {
        echo "Deletado com sucesso Srº (ª) " . $_SESSION["login"];

        $log = fopen("deletados.txt", "a+");
        fwrite($log, "Excluido em: " . date("d/m/Y") . " as " . date("H:i:s"));
        fwrite($log, "\nDeletado Por:" . $_SESSION["login"]);
        fwrite($log, "\nAcomodação deletada:" . $idacomodacoes);
        fwrite($log, "\n----------------------------\n\n");

        fclose($log);
    } else {
        echo "Erro ao deletar!";
    }
    mysqli_close($con);

    ?>
    <br />
    <a href="../../funcionarios/include/painel.php">Voltar para o Painel</a>


</body>

</html>