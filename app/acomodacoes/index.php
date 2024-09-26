<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
?>



<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Consultar quarto</title>
        
        <script>
            
            function excluir(mat){
                
                if(confirm('Deseja realmente excluir ?' )){
                    location.href='/app/acomodacoes/include/eAcomodacoes.php?IDacomodacoes='+mat;
                }
                
            }
            
        </script>
        
        
    </head>
    <body>
             <h3>Consulta de acomodações cadastradas</h3>
        
        <form action="index.php" method="get">
            
            Nome:
            <input type="text" name="nome" value="%"/>
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
            if(!empty($_GET["nome"])){
               $Nome = $_GET["nome"];
               
               
               $sql = "select * from acomodacoes where nome like '%{$Nome}%'";
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); 
               
               if($totalregistros > 0){
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>Nome da Acomodação</th>
                            <th>Valor da Acomodação</th>
                            <th>Capacidade</th>
                            <th>Tipo de Acomodação</th>
                            
                            <?php
                                if($permissaoPerfil !== "u") {
                                    ?>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    <?php
                                }
                            ?>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $Idacomodacoes = $row['idacomodacoes'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["nome"]?></td>
                            <td><?php echo $row["valor"]?></td>
                            <td><?php echo $row["capacidade"]?></td>
                            <td><?php if($row["tipo"] == 's'){
                                  echo "Suite";
                            }else{
                                echo "Apartamento";
                            }
                            ?></td>
                            <?php
                                if($permissaoPerfil !== "u") {
                                    ?>
                                       <td><a href="editar.php?IDacomodacoes=<?php echo $Idacomodacoes ?>">...</a></td>
                                       <td><a href="#" onclick="excluir(<?php echo $Idacomodacoes ?>)">X</a></td>
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
        <a href="/app/acomodacoes/cadastrar.php">Cadastrar acomodação</a> </br>
        <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
    </body>
</html>
