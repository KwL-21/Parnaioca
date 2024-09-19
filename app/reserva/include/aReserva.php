<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
date_default_timezone_set('America/Sao_Paulo');
?>
<?php
   $idReserva = $_POST['idusuario'];
   $acomodacao = $_POST['acomodacoes'];
   $dtinicio = $_POST['inicio'];
    $dtfinal = $_POST['final'];
    $CPF = $_POST['cpf'];
    $situacao= $_POST['situacao'];

    $datai = explode("/", $dtinicio); 
    $datai = array_reverse($datai); 
    $dtinicio = implode("-", $datai);

    $dataf = explode("/", $dtfinal); 
    $dataf = array_reverse($dataf); 
    $dtfinal = implode("-", $dataf);
    
    
    $sql = "update reserva set 
            Acomodacoes = '{$acomodacao}', inicio = '{$dtinicio}', final = '{$dtfinal}', cliente = '{$CPF}', situacao= '{$situacao}'
            where idreserva = ".$idReserva;
                 
    if(mysqli_query($con, $sql)){
        echo "Dados atualizados com sucesso!";
        
        
           $log= fopen("Editados.txt", "a+");
            fwrite($log, "Editado em: ".date("d/m/Y"). " as ".date("H:i:s"));
            fwrite($log,"\nEditados Por:" .$_SESSION["login"]);
            fwrite($log,"\nReserva editada:" .$idReserva);
            fwrite($log, "\n----------------------------\n\n");
            

            fclose($log);
        
    }else{
        echo "Erro ao atualizar!";
    }
    mysqli_close($con);
?>
<br/>
<a href="/app/funcionarios/include/painel.php">Painel</a>
