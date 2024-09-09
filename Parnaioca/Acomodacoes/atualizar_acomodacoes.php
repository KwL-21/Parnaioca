<?php //session_start(); 
date_default_timezone_set('America/Sao_Paulo');
 include_once './validar.php';
?>
<?php

$IDacomodacoes = $_POST['idacomodacoes'];
$acomodacoes = $_POST["nome"];
$Valoracomodacao = $_POST["valor"];
$capacidade = $_POST["capacidade"];
$Tipoacomodacao = $_POST["tipo"];


    include_once './conexao.php';
    
    $sql = "update acomodacoes set 
            nome = '{$acomodacoes}', valor = '{$Valoracomodacao}', capacidade = '{$capacidade}', tipo = '{$Tipoacomodacao}'
            where idacomodacoes like '{$IDacomodacoes}'";
                 
    if(mysqli_query($con, $sql)){
        echo "Dados atualizados com sucesso!";
        
        
            //Criando Log de Operação "Gravado com Sucesso"
           $log= fopen("Editados.txt", "a+");
            //escreve no arquivo
            fwrite($log, "Editado em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nEditados Por:" .$_SESSION["login"]);
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
