<?php 
date_default_timezone_set('America/Sao_Paulo');
 include_once './validar.php';

 if($_SESSION["perfil"] == "u"){
    header("Location:Parnaioca/painel.php");
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

    $idacomodacoes = $_GET["idacomodacoes"];
   
    include_once './conexao.php';
    
    $sql = "delete from acomodacoes where idacomodacoes = ".$idacomodacoes;
    
    if(mysqli_query($con, $sql)){
        echo "Deletado com sucesso Srº (ª) ".$_SESSION ["login"];
        
           $log= fopen("deletados.txt", "a+");
            fwrite($log, "Excluido em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nDeletado Por:" .$_SESSION["login"]);
            fwrite($log, "\n----------------------------\n\n");
            
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