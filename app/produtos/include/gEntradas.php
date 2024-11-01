<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
date_default_timezone_set('America/Sao_Paulo');

$nomeproduto = $_POST['nome'];
$comprado = $_POST['entradas'];
$hoje = date('Y-m-d');


$flag = 0;
$msg = "";

$sqlproduto = "SELECT * FROM produtos WHERE nome LIKE '{$nomeproduto}'";
$resultproduto = mysqli_query($con, $sqlproduto);
$row = mysqli_fetch_assoc($resultproduto);
$qtcompra = $row['entradas'];
$qtvendas = $row['saidas'];
$estoque = $row['estoque'];

if (mysqli_num_rows($resultproduto) == 0) {
    $flag = 1;
    $msg = "Produto inexistente, por favor informe um produto existente";
}

if ($comprado == "") {
    $comprado = 0;
}

$entradas = $comprado + $qtcompra;

$iestoque = $entradas - $qtvendas;

if ($qtvendas > $entradas) {
    $flag = 1;
    $msg = "Estoque insuficiente para esta retirada, quantidade disponivel no estoque é de:" . $estoque;
}


if ($flag == 0) {

    $sql = "UPDATE produtos SET
    entradas = '{$entradas}',
    estoque = '{$iestoque}',
    ultimacompra = '{$hoje}' ";

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
<a href="/app/funcionarios/include/painel.php">Menu principal</a>