<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Consultar Reserva</title>
        
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
        
        <form action="index.php" method="get">
            
            Nome:
            <input type="text" name="idReserva" value="%">
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
        
            if(!empty($_GET["idReserva"])){
               $Acomodacao = $_GET["idReserva"];
               
               
               $sql = "select * from reserva where idReserva like '%{$Acomodacao}%'";
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
                            <?
                            if($permissaoPerfil !== "u") {
                                    ?>
                                    <th>Editar</th>
                                    <?php
                                }
                            ?>
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
                            <?
                            if($permissaoPerfil !== "u") {
                                    ?>
                                <td><a href="/app/reserva/editar.php?idReserva=<?php echo $idMatricula ?>">...</a></td> 
                                    <?php
                                }
                            ?>
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
        <a href="/app/reserva/reserva.php">Realizar reserva</a></br>
        <a href="/app/reserva/checkin.php">Realizar check-in</a></br>
        <a href="/app/reserva/checkout.php">Realizar check-out</a></br>
        <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
    </body>
</html>
