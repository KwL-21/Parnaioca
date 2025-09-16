<?php
include('../config/conexao.php');
include('../../login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

$IDacomodacoes = $_POST['idacomodacoes'];
$acomodacoes = $_POST["nome"];
$Valoracomodacao = $_POST["valor"];
$capacidade = $_POST["capacidade"];
$Tipoacomodacao = $_POST["tipo"];

if ($Valoracomodacao <= 0) {
    $flag = 1;
    $msg = "Valor inválido";
}

if ($capacidade <= 0) {
    $flag = 1;
    $msg = "Valor inválido, Selecione um valor maior que 0";
}

$sql = "update acomodacoes set 
            nome = '{$acomodacoes}',
            valor = '{$Valoracomodacao}',
            capacidade = '{$capacidade}',
            tipo = '{$Tipoacomodacao}'
            where idacomodacoes like '{$IDacomodacoes}'";

if ($flag == 0) {
    if (mysqli_query($con, $sql)) {
        $msg = "Dados atualizados com sucesso!";
    } else {
        $msg = "Erro ao gravar!";
    }


    $log = fopen("Editados.txt", "a+");
    fwrite($log, "Editado em: " . date("d/m/Y") . " as " . date("H:i:s"));
    fwrite($log, "\nEditados Por:" . $_SESSION["login"]);
    fwrite($log, "\nAcomodação editada:" . $IDacomodacoes);
    fwrite($log, "\n----------------------------\n\n");

    fclose($log);
} else {
    echo "Erro ao atualizar!";
}
mysqli_close($con);
?>
<br />
<a href="../funcionarios/include/painel.php">Painel</a>