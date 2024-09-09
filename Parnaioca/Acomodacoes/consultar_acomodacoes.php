<?php //session_start(); 
 include_once './validar.php';
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <script>
            
            function excluir(mat){
                
                if(confirm('Deseja realmente excluir ?' )){
                    location.href='excluir_acomodacoes.php?IDacomodacoes='+mat;
                }
                
            }
            
        </script>
        
        
    </head>
    <body>
             <h3>Consulta de acomodações cadastradas</h3>
        
        <form action="consultar_acomodacoes.php" method="get">
            
            Nome:
            <input type="text" name="nome"/>
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
        //testando se alguem pesquisou algo
            if(!empty($_GET["nome"])){
               $Nome = $_GET["nome"];
               
               include_once './conexao.php';
               
               $sql = "select * from acomodacoes where nome like '{$Nome}'";
              // echo $sql;
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); //num de linhas
               
               if($totalregistros > 0){
                   //echo "OK";
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>Nome da Acomodação</th>
                            <th>Valor da Acomodação</th>
                            <th>Capacidade</th>
                            <th>Tipo de Acomodação</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $Idacomodacoes = $row['idacomodacoes'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["nome"]?></td>
                            <td><?php echo $row["valor"]?></td>
                            <td><?php echo $row["capacidade"]?></td>
                            <td><?php echo $row["tipo"]?></td>
                             <td><a href="editar_acomodacoes.php?IDacomodacoes=<?php echo $Idacomodacoes ?>">...</a></td>
                             <td><a href="#" onclick="excluir(<?php echo $Idacomodacoes ?>)">X</a></td>                         </tr>
                        
                        <?php
                   }                   
                   echo "</table>";
                   ?>
                   </table>
                   <?php
                   
                   echo "Total de registros: ".$totalregistros;
                   
               }else{
                   echo "Nenhum registro encontrado!";
               }               
               
               mysqli_close($con);
               
            }
        ?>
        <hr/>
        <a href="/Parnaioca/Funcionarios/painel.php">Pagina Inicial</a>
    </body>
</html>
