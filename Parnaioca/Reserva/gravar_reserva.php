<?php
include_once './conexao.php';

     $acomodacao = $_POST['acomodacoes'];
     $dtinicio = $_POST['inicio'];
     $dtfinal = $_POST['final'];
     $CPF = $_POST['cpf'];
     

     $datai = explode("/", $dtinicio); 
     $datai = array_reverse($datai); 
     $dtinicio = implode("-", $datai);

     $dataf = explode("/", $dtfinal); 
     $dataf = array_reverse($dataf); 
     $dtfinal = implode("-", $dataf);



$sqlcpf = "select * from clientes where CPF = '{$CPF}'";
$resultcpf = mysqli_query($con, $sqlcpf);

$sqlacomodacoes = "select * from reserva where Acomodacoes = '{$acomodacao}'";
$resultacomodacoes = mysqli_query($con, $sqlacomodacoes);

 $sqlreserva = 
    "SELECT * 
    FROM reserva 
    WHERE (
            (inicio BETWEEN CAST('{$dtinicio}' AS DATE) and CAST('{$dtfinal}' AS DATE)) OR
            (final BETWEEN CAST('{$dtinicio}' AS DATE) and CAST('{$dtfinal}' AS DATE)) OR
            (inicio < '$dtinicio' AND final > '$dtfinal') OR
            (inicio > '$dtinicio' AND final < '$dtfinal')
        )
    AND ((Acomodacoes LIKE '{$acomodacao}') AND (situacao = 'reservado' OR situacao = 'ocupado'))
 ";
 $resultreserva = mysqli_query($con, $sqlreserva);



         if(mysqli_num_rows($resultcpf) == 0){
    echo "Cliente não cadastrado, por favor realize o cadastro antes de prosseguir";
}elseif ($dtinicio > $dtfinal){
    echo "A data inicial não pode ser maior que a data final.";
    echo "<BR>";
}elseif($acomodacao ==''){
    echo "Selecione a Acomodação!";
}elseif (mysqli_num_rows($resultreserva) > 0){
    echo "Data indisponivel!"; 
}else{


    $sql = "INSERT INTO reserva(acomodacoes, inicio, final, situacao, cliente) values('{$acomodacao}','{$dtinicio}','{$dtfinal}','reservado','{$CPF}' )";
    
    if(mysqli_query($con, $sql)){
        echo "Gravada reserva de número:", mysqli_insert_id($con);
    }else{
        echo "Erro ao gravar!";
    }
    
}
mysqli_close($con); 

?>
<br/>
<a href="/Parnaioca/Funcionarios/painel.php">Menu principal</a>
