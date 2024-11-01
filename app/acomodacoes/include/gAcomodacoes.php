<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

$acomodacoes = $_POST["acomodacoes"];
$Valoracomodacao = $_POST["valor"];
$capacidade = $_POST["capacidade"];
$Tipoacomodacao = $_POST["tipo"];

$flag = 0;
$msg = "";


$sqlacomodacoes = "select * from acomodacoes where nome = '{$acomodacoes}'";
$resultacomodacoes = mysqli_query($con, $sqlacomodacoes);

if (mysqli_num_rows($resultacomodacoes) == 1) {
    $flag = 1;
    $msg = "</br> Acomodação já existente";
}


if ($flag == 0) {

    $sql = "INSERT INTO acomodacoes 
    (nome,
    valor,
    capacidade,
    tipo)
     values
    ('{$acomodacoes}',
    '{$Valoracomodacao}',
     '{$capacidade}',
     '{$Tipoacomodacao}')";

    if (mysqli_query($con, $sql)) {
        $msg = "Gravado com sucesso!";
    } else {
        $msg = "Erro ao gravar!";
    }
}

echo $msg;
mysqli_close($con);

?>
<br />
<a href="/app/funcionarios/include/painel.php">Painel de Controle</a>