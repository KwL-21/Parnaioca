<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/config/validar.php');
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <script>
            
            function excluir(mat){
                
                if(confirm('Deseja realmente excluir ?' )){
                    location.href='/app/funcionarios/include/eFuncionario.php?idusuario='+mat;
                }
                
            }
            
        </script>
        
        
    </head>
    <body>
             <h3>Consulta de Registro</h3>
        
        <form action="consultar.php" method="get">
            
            Nome:
            <input type="text" name="login"/>
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
            if(!empty($_GET["login"])){
               $login = $_GET["login"];
               
               
               $sql = "select * from funcionarios where login like '{$login}'";
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); 
               
               if($totalregistros > 0){
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>login</th>
                            <th>Perfil</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $idMatricula = $row['matricula'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["login"]?></td>
                            <td><?php echo $row["perfil"]?></td>
                             <td><a href="editar.php?idMatricula=<?php echo $idMatricula ?>">...</a></td>
                             <td><a href="#" onclick="excluir(<?php echo $idMatricula ?>)">X</a></td> 
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
        <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
    </body>
</html>
