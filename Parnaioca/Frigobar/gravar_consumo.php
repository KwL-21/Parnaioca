<?php
    include_once './conexao.php';
    date_default_timezone_set('America/Sao_Paulo');

    $acomodacao = $_POST['acomodacao'];
    $idreserva = $_POST['idreserva'];
    $produto = $_POST['produto'];
    $idfrigobar = $_POST['idfrigobar'];
    $quantidade = $_POST['quantidade'];
    $hoje = date('d-m-Y');

    $sqlvalor = "SELECT * FROM produtos  WHERE nome LIKE '{$produto}'";
    $resultvalor = mysqli_query($con, $sqlvalor);
    $row4 = mysqli_fetch_assoc($resultvalor);
    $unitario = $row4['valorunitario'];

    $valor = $unitario * $quantidade;



    $flag = 0;
    $msg = "";

    $sqlacomodacao = "SELECT * FROM acomodacoes WHERE nome LIKE '{$acomodacao}'";
    $resultacomodacao = mysqli_query($con, $sqlacomodacao);
    $row = mysqli_fetch_assoc($resultacomodacao);
    $idacomodacoes = $row['idacomodacoes'];

    if(mysqli_num_rows($resultacomodacao) == 0){
        $flag = 1;
        $msg = "Acomodação inexistente!";
    }

    $sqlreserva = "SELECT * FROM reserva WHERE idreserva LIKE '{$idreserva}'";
    $resultreserva = mysqli_query($con, $sqlreserva);

    $sqlcheckin = "SELECT * FROM checkin WHERE idreserva LIKE '{$idreserva}'";
    $resultcheckin = mysqli_query($con, $sqlcheckin);
    $row1 = mysqli_fetch_assoc($resultcheckin);
    $idcheckin = $row1['idcheckin'];


    if(mysqli_num_rows($resultreserva) == 0){
        $flag = 1;
        $msg = "Reserva inexistente!";
    }

    $sqlproduto = "SELECT * FROM produtos WHERE nome LIKE '{$produto}'";
    $resulproduto = mysqli_query($con, $sqlproduto);
    $row3 = mysqli_fetch_assoc($resulproduto);
    $idproduto = $row3['idproduto'];
    

    $sqlfrigobar = "SELECT * FROM frigobar WHERE id LIKE '{$idfrigobar}'";
    $resultfrigobar = mysqli_query($con, $sqlfrigobar);

    if(mysqli_num_rows($resultfrigobar) == 0){
        $flag = 1;
        $msg = "Frigobar inexistente!";
    }

    $sqlquantidade = "SELECT * FROM estoque_frigobar WHERE idfrigobar LIKE '{$idfrigobar}' AND idprodutos like '{$idproduto}'
     AND quantidade < $quantidade";
     $resultquantidade = mysqli_query($con, $sqlquantidade);

     if(mysqli_num_rows($resultquantidade) > 0){
        $flag = 1;
        $msg = "Estoque insuficiente!";
     }
  
     if($flag == 0){
        
        $sql = "INSERT INTO consumidos (idacomodacoes, idreserva, idcheckin, idestoque, idfrigobar, quantidade, valor, data) values
        ('{$idacomodacoes}','{$idreserva}', '{$idcheckin}','{$idproduto}','$idfrigobar', '{$quantidade}','{$valor}','{$hoje}')";
          if(mysqli_query($con, $sql)){
              $msg = "Gravado com sucesso!";
          }else{
              $msg = "Erro ao gravar!";
          }
          
      }
      
      echo $msg;
      mysqli_close($con);
?>
<br/>
<a href="/Parnaioca/Funcionarios/menu_adm.php">Menu principal</a>
