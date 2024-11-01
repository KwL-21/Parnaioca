<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

$IDacomodacoes = $_POST['idacomodacoes'];
$acomodacoes = $_POST["nome"];
$Valoracomodacao = $_POST["valor"];
$capacidade = $_POST["capacidade"];
$Tipoacomodacao = $_POST["tipo"];



$sql = "update acomodacoes set 
            nome = '{$acomodacoes}',
            valor = '{$Valoracomodacao}',
            capacidade = '{$capacidade}',
            tipo = '{$Tipoacomodacao}'
            where idacomodacoes like '{$IDacomodacoes}'";

if (mysqli_query($con, $sql)) {
    echo "Dados atualizados com sucesso!";


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
<a href="/app/funcionarios/include/painel.php">Painel</a>