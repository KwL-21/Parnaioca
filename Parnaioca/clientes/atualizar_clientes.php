<?php //session_start(); 
date_default_timezone_set('America/Sao_Paulo');
 include_once './validar_cliente.php';
?>
<?php

    $idsuario = $_POST["idcliente"];
    $CPF = $_POST["cpf"];
    $nome =  $_POST["nome"];
    $dtnasc = $_POST["nascimento"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $perfil =  $_POST["situacao"];
    
    //Tratamento de data
    $data = explode("/", $dtnasc); //[dd][mm][aaaa]
    $data = array_reverse($data); //[aaaa][mm][dd]
    $dtnasc = implode("-", $data);

    include_once './conexao.php';
    
    $sql = "update clientes set 
            nome = '{$nome}', nascimento = '{$dtnasc}', email = '{$email}', estado = '{$estado}', cidade = '{$cidade}', situacao = '{$perfil}', telefone = '{$telefone}'
            WHERE idcliente =" .$idusuario;
                 
    if(mysqli_query($con, $sql)){
        echo "Dados atualizados com sucesso!";
        
        
            //Criando Log de Operação "Gravado com Sucesso"
           $log= fopen("Editados.txt", "a+");
            //escreve no arquivo
            fwrite($log, "Editado em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nEditados Por:" .$_SESSION["login"]);
            fwrite($log, "\nID Usuario: ".$idsuario);
            fwrite($log, "\nPerfil do Operador: ".$perfil);
            fwrite($log, "\n----------------------------\n\n");
            
            //fecha o arquivo
            fclose($log);
        
    }else{
        echo "Erro ao atualizar!";
    }
    mysqli_close($con);
?>
<br/>
<a href="/Parnaioca/Funcionarios/painel.php">Painel</a>
