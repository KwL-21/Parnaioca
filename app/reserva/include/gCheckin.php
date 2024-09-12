<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
    
    $idreserva = $_POST['idreserva'];
    $hopedes = $_POST['hospedes'];
    $pagamento = $_POST['pagamento'];

    $flag = 0;
    $msg = "";

    $sqlid = "SELECT * FROM reserva WHERE idReserva = $idreserva";
    $resultid = mysqli_query($con, $sqlid);
    $row1 = mysqli_fetch_assoc($resultid);
    $acomodacao = $row1["Acomodacoes"]; 

   

    if(mysqli_num_rows($resultid) == 0){
      $flag = 1;
      $msg = "Indique uma reserva existente!";
    }

    $sqlhospedes = "SELECT * FROM acomodacoes WHERE nome LIKE '{$acomodacao}'";
    $resulthospedes = mysqli_query($con, $sqlhospedes);
    $row = mysqli_fetch_assoc($resulthospedes);
    $capacidade = $row['capacidade'];
    
    if($hopedes > $capacidade){
        $flag = 1;
        $msg = "Acomodação não suporta essa quantidade de hospedes!";
    }

    if ($flag == 0);{
        $sql = "INSERT INTO checkin (idReserva, hospedes, forma_de_pagamento) VALUES ('{$idreserva}', '{$hopedes}', '{$pagamento}')";
        $update = "UPDATE reserva SET situacao = 'ocupado' WHERE idReserva = $idreserva";
        if(mysqli_query($con, $sql)){
           if(mysqli_query($con, $update)){
            $msg = "Gravado com sucesso!";
           }
        }else{
           $msg = "Erro ao gravar!";
        }
    }
    echo $msg;
    mysqli_close($con);

?>
<br/>
<a href="/app/funcionarios/include/painel.php">Painel de Controle</a>
    

