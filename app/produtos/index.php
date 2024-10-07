<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Estoque</title>
        
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
            <select name="nome" required>
                <option value="">Selecione um produto</option>
                <option value="%">Todos os produtos</option>
                <?php
                $sqlprod = mysqli_query($con, "SELECT nome FROM produtos");
                

                while($produtos = mysqli_fetch_assoc($sqlprod)){
                    ?>
                    <option value="<?php echo $produtos['nome']?>"><?php echo $produtos['nome'] ?></option>
                    <?php
                    }
                    ?>
             </select>
             <input type="submit" name="Enviar"/>
        </form>
        
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
                            <th>Nome do produto</th>
                            <th>Quantidade em estoque</th>
                            <th>Preço</th>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $idfrigobar = $row['idproduto'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["nome"]?></td>
                            <td><?php echo  $row["estoque"]?></td>
                            <td><?php echo "R$".$row["valorunitario"]?></td>
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
        <a href="/app/produtos/cadastrar.php">Cadastrar produtos</a><br/>
        <a href="/app/produtos/entradas.php">Registrar entradas</a><br/>
        <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
    </body>
</html>
