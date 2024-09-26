<?php
     include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
     include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
     date_default_timezone_set('America/Sao_Paulo');

     $nomeproduto = $_POST['nome'];
     $valorpago = $_POST['valorpago'];
     $entradas = $_POST['entrada'];
     $marca = $_POST['marca'];
     $hoje = date('Y-m-d H:i:s');
     $porcentagem = $_POST['porcento'];

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

     if($marca == ""){
        $flag = 1;
        $msg = "Preencha a marca!";
     }

     if($porcentagem == ""){
      $porcentagem = 0.75;
     }


     $lucro = $valorpago * $porcentagem;
     $valorunitario = $valorpago + $lucro;


     if($flag == 0){
        
        $sql = "INSERT INTO produtos (nome, valorunitario, valorpagounitario, entradas, estoque, marca, ultimacompra) values
        ('{$nomeproduto}','{$valorunitario}', '{$valorpago}','{$entradas}', '{$entradas}','{$marca}', '{$hoje}')";
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