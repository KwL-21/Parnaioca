 <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

  date_default_timezone_set('America/Sao_Paulo');

  $idreserva = $_POST['idreserva'];

  $flag = 0;
  $msg = "";

  $sqlreserva = "select * from reserva where idreserva like '{$idreserva}'";
  $resultreserva = mysqli_query($con, $sqlreserva);
  $row1 = mysqli_fetch_assoc($resultreserva);
  $acomodacao = $row1["acomodacoes"];
  $entrada = $row1["inicio"];
  $saida = $row1["final"];

  $sqlacomodacao = "SELECT * FROM acomodacoes WHERE nome LIKE '{$acomodacao}'";
  $resultacomodacao = mysqli_query($con, $sqlacomodacao);
  $row2 = mysqli_fetch_assoc($resultacomodacao);
  $idacomodacao = $row2['idacomodacoes'];


  $sqlpreco = "SELECT valor FROM acomodacoes WHERE nome LIKE '{$acomodacao}'";
  $resultpreco = mysqli_query($con, $sqlpreco);
  $row3 = mysqli_fetch_assoc($resultpreco);
  $precoAcomodacao = $row3["valor"];

  $sqlconsumo = "SELECT sum(valor) as total FROM consumidos WHERE data
                BETWEEN CAST('{$entrada}' AS DATE) and CAST('{$saida}' AS DATE)
                AND idacomodacoes LIKE '{$idacomodacao}'";
  $resultconsumo = mysqli_query($con, $sqlconsumo);
  $row4 = mysqli_fetch_assoc($resultconsumo);
  $consumo = $row4["total"];

  if ($consumo == "") {
    $consumo = 0;
  }

  $total = $precoAcomodacao + $consumo;


  $sqlexiste = "SELECT * FROM checkout WHERE idreserva LIKE '{$idreserva}'";
  $resultexiste = mysqli_query($con, $sqlexiste);

  if (mysqli_num_rows($resultexiste) > 0) {
    $flag = 1;
    $msg = "Check-Out já realizado!";
  }

  if ($flag == 0) {
    $sql = "INSERT INTO checkout (idreserva, consumo, totalapagar, situacao) VALUES ('{$idreserva}','{$consumo}','{$total}','p')";
    if ($resultsql = mysqli_query($con, $sql)) {
      $msg = "Check-out gravado, Total a pagar R$" . $total;
    } else {
      $msg = "erro ao gravar!";
    }
  }


  echo $msg;
  mysqli_close($con);
  ?>
 <br />
 <a href="/app/funcionarios/include/painel.php">Menu principal</a>