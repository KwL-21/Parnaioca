<?php //session_start(); 
date_default_timezone_set('America/Sao_Paulo');
 include_once './validar.php';

 if($_SESSION["perfil"] == "user"){
    header("Location:/Parnaioca/painel.php");
    die();
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
    
<?php
 include_once './validar.php';
?>

<?php

    $idusuario = $_GET["matricula"];
   
    include_once './conexao.php';
    
    $sql = "delete from funcionarios where matricula = ".$idusuario;
    
    if(mysqli_query($con, $sql)){
        echo "Deletado com sucesso Srº (ª) ".$_SESSION ["login"];
        
            //Criando Log de Operação "Gravado com Sucesso"
           $log= fopen("deletados.txt", "a+");
            //escreve no arquivo
            fwrite($log, "Excluido em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nDeletado Por:" .$_SESSION["login"]);
            fwrite($log, "\nId Usuario: ".$idusuario);
            fwrite($log, "\nLogin: ".$sql);
            fwrite($log, "\n----------------------------\n\n");
            
            //fecha o arquivo
            fclose($log);
        
        
        
        }else{
        echo "Erro ao deletar!";
    }
    mysqli_close($con);

    ?>
<br/>
<a href="/Parnaioca/Funcionarios/painel.php">Voltar para o Painel</a>

    
</body>
</html>