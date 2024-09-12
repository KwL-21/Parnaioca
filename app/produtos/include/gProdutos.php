<?php
     include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
     date_default_timezone_set('America/Sao_Paulo');

     $nomeproduto = $_POST['nome'];
     $valorpago = $_POST['valorpago'];
     $entradas = $_POST['entrada'];
     $marca = $_POST['marca'];
     $dtcompra = $_POST['ultimacompra'];
     $hoje = date('Y-m-d H:i:s');

     $flag = 0;
     $msg = "";

     $sqlproduto = "SELECT * FROM produtos WHERE nome LIKE '{$nomeproduto}'";
     $resultproduto = mysqli_query($con, $sqlproduto);

     if(mysqli_num_rows($resultproduto) > 0){
        $flag = 1;
        $msg = "Produto já cadastrado!";
     }

     if($valorpago == ""){
        $flag = 1;
        $msg = "Preencha o valor!";
     }  

     if($entradas == ""){
        $entradas = 0;
     }

     if($marca == ""){
        $flag = 1;
        $msg = "Preencha a marca!";
     }

     if($dtcompra == ""){
        $dtcompra = $hoje;
     }

     $valorunitario = $valorpago * 1.75;


     if($flag == 0){
        
        $sql = "INSERT INTO produtos (nome, valorunitario, valorpagounitario, entradas, marca, ultimacompra) values
        ('{$nomeproduto}','{$valorunitario}', '{$valorpago}','{$entradas}','{$marca}', '{$dtcompra}')";
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
<a href="/app/funcionarios/include/painel.php">Menu principal</a>