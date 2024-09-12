<?php 
 include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
 include($_SERVER['DOCUMENT_ROOT'].'/app/config/validar.php');

date_default_timezone_set('America/Sao_Paulo');

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

    $idusuario = $_GET["matricula"];
   
    
    $sql = "delete from funcionarios where matricula = ".$idusuario;
    
    if(mysqli_query($con, $sql)){
        echo "Deletado com sucesso Srº (ª) ".$_SESSION ["login"];
        
           $log= fopen("deletados.txt", "a+");
            fwrite($log, "Excluido em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nDeletado Por:" .$_SESSION["login"]);
            fwrite($log, "\nId Usuario: ".$idusuario);
            fwrite($log, "\nLogin: ".$sql);
            fwrite($log, "\n----------------------------\n\n");
            
            fclose($log);
        
        
        
        }else{
        echo "Erro ao deletar!";
    }
    mysqli_close($con);

    ?>
<br/>
<a href="/app/funcionarios/include/painel.php">Voltar para o Painel</a>

    
</body>
</html>