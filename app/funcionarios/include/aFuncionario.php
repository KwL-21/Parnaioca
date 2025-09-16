<?php
include('../../config/conexao.php');
include('../../../login/validar.php');
date_default_timezone_set('America/Sao_Paulo');

$idsuario = $_POST["idusuario"];
$login =  $_POST["login"];
$CPF = $_POST["cpf"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$perfil =  $_POST["perfil"];


$sql = "UPDATE funcionarios SET 
            login = '{$login}',
            cpf = '{$CPF}',
            email = '{$email}',
            senha = '{$senha}',
            perfil = '{$perfil}'
            WHERE matricula = " . $idsuario;

if (mysqli_query($con, $sql)) {
    echo "Dados atualizados com sucesso!";


    $log = fopen("Editados.txt", "a+");
    fwrite($log, "Editado em: " . date("d/m/Y") . " as " . date("H:i:s"));
    fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
    fwrite($log, "\nID Usuario editado: " . $idsuario);
    fwrite($log, "\nPerfil do Operador: " . $perfil);
    fwrite($log, "\n----------------------------\n\n");

    fclose($log);
} else {
    echo "Erro ao atualizar!";
}
mysqli_close($con);
?>
<br />
<a href="./painel.php">Painel</a>