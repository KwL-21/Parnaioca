<?php //session_start(); 
date_default_timezone_set('America/Sao_Paulo');
 include_once './validar.php';
?>
<?php

    $idsuario = $_POST["matricula"];
    $login =  $_POST["login"];
    $CPF = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $perfil =  $_POST["perfil"];
    
    include_once './conexao.php';
    
    $sql = "update funcionarios set 
            login = '{$login}', cpf = '{$CPF}', email = '{$email}', senha = '{$senha}', perfil = '{$perfil}'
            where matricula = ".$idsuario;
                 
    if(mysqli_query($con, $sql)){
        echo "Dados atualizados com sucesso!";
        
        
            //Criando Log de Operação "Gravado com Sucesso"
           $log= fopen("Editados.txt", "a+");
            //escreve no arquivo
            fwrite($log, "Editado em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nEditados Por:" .$_SESSION["login"]);
            fwrite($log, "\nID Usuario: ".$idsuario);
            fwrite($log, "\nLogin do Operador: " .$login);
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
