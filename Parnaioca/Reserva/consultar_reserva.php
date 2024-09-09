<?php 
 include_once './validar.php';
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Consulta de Reserva</title>
        
        <script>
            
            function excluir(mat){
                
                if(confirm('Deseja realmente excluir ?' + mat)){
                    location.href='excluir.php?idusuario='+mat;
                }
                
            }
            
        </script>
        
        
    </head>
    <body>
             <h3>Consulta de Reserva</h3>
        
        <form action="consultar_reserva.php" method="get">
            
            Nome:
            <input type="text" name="idReserva">
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
        
            if(!empty($_GET["idReserva"])){
               $Acomodacao = $_GET["idReserva"];
               
               include_once './conexao.php';
               
               $sql = "select * from reserva where idReserva like '{$Acomodacao}'";
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); 
               
               if($totalregistros > 0){
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>Acomodação</th>
                            <th>CPF</th>
                            <th>Data de Inicio</th>
                            <th>Data de Termino</th>
                            <th>Situação</th>
                            <th>Editar</th>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $idMatricula = $row['idreserva'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["acomodacoes"]?></td>
                            <td><?php echo $row["cliente"]?></td>
                            <td><?php echo $row["inicio"]?></td>
                            <td><?php echo $row["final"]?></td>
                            <td><?php echo $row["situacao"]?></td>
                             <td><a href="/Reserva/editar_reservas.php?idReserva=<?php echo $idMatricula ?>">...</a></td> 
                        </tr>
                        
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
