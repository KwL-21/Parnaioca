<?php //session_start(); 
date_default_timezone_set('America/Sao_Paulo');
 include_once './validar.php';
?>
<?php
   $idReserva = $_POST['idusuario'];
   $acomodacao = $_POST['acomodacoes'];
   $dtinicio = $_POST['inicio'];
    $dtfinal = $_POST['final'];
    $CPF = $_POST['cpf'];
    $situacao= $_POST['situacao'];

    $datai = explode("/", $dtinicio); //[dd][mm][aaaa]
    $datai = array_reverse($datai); //[aaaa][mm][dd]
    $dtinicio = implode("-", $datai);

    $dataf = explode("/", $dtfinal); //[dd][mm][aaaa]
    $dataf = array_reverse($dataf); //[aaaa][mm][dd]
    $dtfinal = implode("-", $dataf);
    
    include_once './conexao.php';
    
    $sql = "update reserva set 
            Acomodacoes = '{$acomodacao}', inicio = '{$dtinicio}', final = '{$dtfinal}', cliente = '{$CPF}', situacao= '{$situacao}'
            where idreserva = ".$idReserva;
                 
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
