 <?php
     include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');

    
     $idReserva = $_POST['idReserva'];
        $pago = $_POST['pagamento'];
          
          $sql = "select * from reserva where idReserva like '{$idReserva}'";
               $result = mysqli_query($con, $sql);
               $row1 = mysqli_fetch_assoc($result);
               $acomodacao = $row1["Acomodacoes"]; 
               $entrada = $row1["InicioReserva"];
               $saida = $row1["dtFinalReserva"];

               $sqlpreco = "SELECT * FROM acomodacoes WHERE nome LIKE '{$acomodacao}'";
               $resultpreco = mysqli_query($con, $sqlpreco);
               $row2 = mysqli_fetch_assoc($resultpreco);
               $precoAcomodacao = $row2["valor_acomodacao"];

               $sqlconsumo = "SELECT preco_total FROM saida_frigobar WHERE dtSaida
                BETWEEN CAST('{$entrada}' AS DATE) and CAST('{$saida}' AS DATE)
                AND acomodacao LIKE '{$acomodacao}'";
                $resultconsumo = mysqli_query($con, $sqlconsumo);
                $row3 = mysqli_fetch_assoc($resultconsumo);
                $consumo = $row3 ["preco_total"];

                $total = $precoAcomodacao + $consumo;
                $pendente = $total - $pago;

                      


?>