<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$dtnasc = $_POST["nascimento"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];



$data = explode("/", $dtnasc);
$data = array_reverse($data);
$dtnasc = implode("-", $data);



$regranome = "/^[a-z A-ZçÇà-üÀ-ÜñÑ]{3,50}$/";

$regraemail = "/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9-]+\.[a-zA-Z.]+$/";

$flag = 0;
$msg = "";

if (!preg_match($regranome, $nome)) {
    $flag = 1;
    $msg = "Preencha o nome corretamente!";
}

if (!preg_match($regraemail, $email)) {
    $flag = 1;
    $msg = $msg . "<br/>Preencha o email corretamente!";
}

$sqlcpf = "select * from clientes where cpf = '{$cpf}'";
$result = mysqli_query($con, $sqlcpf);
$sqltelefone = "SELECT * FROM clientes WHERE telefone = '{$telefone}'";
$resulttelefone = mysqli_query($con, $sqltelefone);


if (mysqli_num_rows($result) == 1) {
    $flag = 1;
    $msg = "Cliente já cadastrado!";
}


if (mysqli_num_rows($resulttelefone) > 0) {
    $flag = 1;
    $msg = "Telefone já cadastrado";
}

function isMaiorDeIdade($dtnasc)
{
    $dtnasc = new DateTime($dtnasc);

    $dataAtual = new DateTime();

    $diferenca = $dataAtual->diff($dtnasc);

    return $diferenca->y < 18;
}

if (isMaiorDeIdade($dtnasc)) {
    $flag = 1;
    echo "Usuário é menor de idade.";
}

if ($flag == 0) {

    $sql = "INSERT INTO clientes
    (nome,
    email,
    cpf,
    nascimento,
    telefone,
    estado,
    cidade,
    situacao)
    values
    ('{$nome}',
    '{$email}',
    '{$cpf}',
    '{$dtnasc}',
    '{$telefone}',
    '{$estado}',
    '{$cidade}',
    'a')";

    if (mysqli_query($con, $sql)) {
        echo "Gravado com sucesso!";
    } else {
        echo "Erro ao gravar!";
    }
}
mysqli_close($con);

?>
<br />
<a href="/app/funcionarios/include/painel.php">Menu principal</a>