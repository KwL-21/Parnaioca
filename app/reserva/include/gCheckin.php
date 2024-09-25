<?php
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
    
    $idreserva = $_POST['idreserva'];
    $hopedes = $_POST['hospedes'];
    $pagamento = $_POST['pagamento'];
    $placa = $_POST['placa'];

    $regraplaca = "/^[A-Z]{3}[0-9][A-Za-z0-9][0-9]{4}$/";
    

    $flag = 0;
    $msg = "";

    if(!preg_match($regraplaca, $placa)){
        $flag = 1;
        $msg = "Preencha a placa corretamente!";
    }

    $sqlid = "SELECT * FROM reserva WHERE idReserva = $idreserva";
    $resultid = mysqli_query($con, $sqlid);
    $row1 = mysqli_fetch_assoc($resultid);
    $acomodacao = $row1["acomodacoes"]; 
    $cliente = $row1["cliente"];

   

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

     $estacionamento = $capacidade / 3;

     if($estacionamento <=1){
        $vagas = 1;
     }else{
        $vagas = 2;
     }

    if ($flag == 0);{
        $sql = "INSERT INTO checkin (idReserva, hospedes, pagamento) VALUES ('{$idreserva}', '{$hopedes}', '{$pagamento}')";
        $update = "UPDATE reserva SET situacao = 'ocupado' WHERE idReserva = $idreserva";
        $estacionamento = "INSERT INTO estacionamento (idreserva, vagas, cliente, placa) Values ('{$idreserva}', '{$vagas}', '{$cliente}', '{$placa}')";
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
<a href="/app/funcionarios/include/painel.php">Painel de Controle</a>
    

