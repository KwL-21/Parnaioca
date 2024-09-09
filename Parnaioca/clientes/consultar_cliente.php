<?php 
 include_once './validar_cliente.php';
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Consulta de clientes</title>
        
        <script>
            
            function excluir(mat){
                
                if(confirm('Deseja realmente excluir ?' + mat)){
                    location.href='excluir.php?idcliente='+mat;
                }
                
            }
            
        </script>
        
        
    </head>
    <body>
             <h3>Consulta de Registro</h3>
        
        <form action="consultar_cliente.php" method="get">
            
            CPF:
            <input type="text" name="cpf"/>
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
            if(!empty($_GET["cpf"])){
               $cpf = $_GET["cpf"];
               
               include_once './conexao.php';
               
               $sql = "select * from clientes where cpf like '{$cpf}'";
             
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); 
               
               if($totalregistros > 0){
                 
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>CPF</th>
                            <th>telefone</th>
                            <th>Email</th>
                            <th>Estadp</th>
                            <th>Editar</th>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $idMatricula = $row['idcliente'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["nome"]?></td>
                            <td><?php echo $row["situacao"]?></td>
                            <td><?php echo $row["cpf"]?></td>
                            <td><?php echo $row["telefone"]?></td>
                            <td><?php echo $row["email"]?></td>
                            <td><?php echo $row["estado"]?></td>
                             <td><a href="/clientes/editar_cliente.php?idcliente=<?php echo $idMatricula ?>">...</a></td>
                           
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
