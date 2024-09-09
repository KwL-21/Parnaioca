<?php
include_once "./conexao.php";
    
    $idreserva = $_POST['idreserva'];
    $hopedes = $_POST['hospedes'];
    $pagamento = $_POST['pagamento'];
    $placa = $_POST['placa'];


    $flag = 0;
    $msg = "";

    $sqlid = "SELECT * FROM reserva WHERE idReserva = $idreserva";
    $resultid = mysqli_query($con, $sqlid);
    $row1 = mysqli_fetch_assoc($resultid);
    $acomodacao = $row1["Acomodacoes"]; 
    $cliente = $row1['cliente'];

    if($placa == ""){
        $placa = "sem_veiculo";
    }


    $vagas = 1;

    if($hopedes > 3){
        $vagas = 2;
    }



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
        $estacionamento = "INSERT INTO estacionamento (idreserva, vagas, cliente, placa) VALUES ('{$idreserva}','{$vagas}','{$cliente}','{$placa}')";
        if(mysqli_query($con, $sql)){
           if(mysqli_query($con, $update)){
               if(mysqli_query($con, $estacionamento)){
                   $msg = "Gravado com sucesso!";
                }
           }
        }else{
           $msg = "Erro ao gravar!";
        }
    }
    echo $msg;
    mysqli_close($con);

?>
<br/>
<a href="/Parnaioca/Funcionarios/painel.php">Painel de Controle</a>
    

