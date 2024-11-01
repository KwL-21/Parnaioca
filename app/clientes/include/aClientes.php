<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

$idusuario = $_POST["idusuario"];
$CPF = $_POST["cpf"];
$nome =  $_POST["nome"];
$dtnasc = $_POST["dtnasc"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$perfil =  $_POST["perfil"];

$data = explode("/", $dtnasc);
$data = array_reverse($data);
$dtnasc = implode("-", $data);


$sql = "UPDATE clientes SET 
        nome = '{$nome}',
        nascimento = '{$dtnasc}',
        email = '{$email}',
        estado = '{$estado}',
        cidade = '{$cidade}',
        situacao = '{$perfil}',
        telefone = '{$telefone}'
        WHERE idcliente =" . $idusuario;

if (mysqli_query($con, $sql)) {
    echo "Dados atualizados com sucesso!";


    $log = fopen("Editados.txt", "a+");
    fwrite($log, "Editado em: " . date("d/m/Y") . " as " . date("H:i:s"));
    fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
    fwrite($log, "\nPerfil do Operador: " . $perfil);
    fwrite($log, "\nId do cliente atualizado:" . $idusuario);
    fwrite($log, "\n----------------------------\n\n");

    fclose($log);
} else {
    echo "Erro ao atualizar!";
}
mysqli_close($con);
?>
<br />
<a href="/app/funcionarios/include/painel.php">Painel</a>