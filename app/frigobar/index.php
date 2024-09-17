<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/config/validar.php');

date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <script>
            
            function excluir(mat){
                
                if(confirm('Deseja realmente excluir ?' )){
                    location.href='excluir.php?idusuario='+mat;
                }
                
            }
            
        </script>
        
        
    </head>
    <body>
             <h3>Consulta de Registro</h3>
        
        <form action="index.php" method="get">
            
            Nome:
            <input type="text" name="nome" value="%"/>
            <input type="submit" value="Buscar" />
            
        </form>
        
        <hr/>
        
        <?php
            if(!empty($_GET["nome"])){
               $login = $_GET["nome"];
               
               
               $sql = "select * from produtos where nome like '%{$login}%'";
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); 
               
               if($totalregistros > 0){
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>Nome do Produto</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Ultima compra</th>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $idMatricula = $row['idproduto'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["nome"]?></td>
                            <td><?php echo $row["valorunitario"]?></td>
                            <td><?php echo $row["estoque"]?></td>
                            <td><?php echo $row["ultimacompra"]?></td>
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
        <a href="/app/frigobar/frigobar.php">Cadastrar frigobar</a><br/>
        <a href="/app/frigobar/itens.php">Cadastrar itens no frigobar</a><br/>
        <a href="/app/frigobar/consumo.php">Cadastrar consumo</a><br/>
        <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
    </body>
</html>

