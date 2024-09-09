<?php
    include_once './conexao.php';
    date_default_timezone_set('America/Sao_Paulo');

    $frigobar = $_POST['frigobar'];
    $aquisicao = $_POST['aquisicao'];
    $tamanho = $_POST['tamanho']; 
    $acomodacao = $_POST['acomodacao'];

    $datai = explode("/", $aquisicao); 
    $datai = array_reverse($datai); 
    $aquisicao = implode("-", $datai);


     $flag = 0;
     $msg = "";


        $sqlacomodacoes = "SELECT * FROM acomodacoes WHERE nome like '{$acomodacao}'";
        $resultacomodacoes = mysqli_query($con, $sqlacomodacoes);
   
        if (mysqli_num_rows($resultacomodacoes) == 0){
           $flag = 1;
           $msg = "Indique uma acomodação existente!";
        }
   
       $sqlacomodacao = "SELECT * FROM frigobar WHERE acomodacao LIKE '{$acomodacao}' AND status LIKE 'a'";
       $resultacomodacao = mysqli_query($con, $sqlacomodacao);
   
        if(mysqli_num_rows($resultacomodacao) > 0){
           $flag = 1;
           $msg = "Acomodação já possui frigobar ativo!";
        }

        if($flag == 0){
        
          $sql = "INSERT INTO frigobar (nome, dataaquisicao, capacidade, acomodacao) values('{$frigobar}','{$aquisicao}', '{$tamanho}','{$acomodacao}')";
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