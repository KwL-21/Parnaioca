<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/config/validar.php');

date_default_timezone_set('America/Sao_Paulo');

    $idsuario = $_POST["idcliente"];
    $CPF = $_POST["cpf"];
    $nome =  $_POST["nome"];
    $dtnasc = $_POST["nascimento"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $perfil =  $_POST["situacao"];
    
    $data = explode("/", $dtnasc); 
    $data = array_reverse($data); 
    $dtnasc = implode("-", $data);

    
    $sql = "update clientes set 
            nome = '{$nome}', nascimento = '{$dtnasc}', email = '{$email}', estado = '{$estado}', cidade = '{$cidade}', situacao = '{$perfil}', telefone = '{$telefone}'
            WHERE idcliente =" .$idusuario;
                 
    if(mysqli_query($con, $sql)){
        echo "Dados atualizados com sucesso!";
        
        
           $log= fopen("Editados.txt", "a+");
            fwrite($log, "Editado em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nEditados Por:" .$_SESSION["login"]);
            fwrite($log, "\nID Usuario: ".$idsuario);
            fwrite($log, "\nPerfil do Operador: ".$perfil);
            fwrite($log, "\n----------------------------\n\n");
            
            fclose($log);
        
    }else{
        echo "Erro ao atualizar!";
    }
    mysqli_close($con);
?>
<br/>
<a href="/app/funcionarios/include/painel.php">Painel</a>
