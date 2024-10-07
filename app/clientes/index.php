<?php 
 include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
 include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
 
 $permissaoPerfil = $_SESSION["perfil"];
?>

<!DOCTYPE html>
<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Consultar clientes</title>
        
    </head>
    <body>
             <h3>Consulta de Registro</h3>
        
        <form action="index.php" method="get">
            
            CPF:
            <select name="cpf" required>
                <option value="">Selecione um cliente</option>
                <option value="%">Todos os clientes</option>
                <?php
                $sqlquarto = mysqli_query($con, "SELECT cpf, nome FROM clientes");
                

                while($quartos = mysqli_fetch_assoc($sqlquarto)){
                    ?>
                    <option value="<?php echo $quartos['cpf']?>"><?php echo $quartos['nome'] ?></option>
                    <?php
                    }
                    ?>
             </select>
             <input type="submit" name="Enviar"/>
        </form>
        
        
        <?php
            if(!empty($_GET["cpf"])){
               $cpf = $_GET["cpf"];
               
               
               $sql = "select * from clientes where cpf like '%{$cpf}%'";
             
               $result = mysqli_query($con, $sql);
               $totalregistros = mysqli_num_rows($result); 
               
               if($totalregistros > 0){
                 
                   ?>
                    <table width="900px" border="1px">  
                        <tr>
                            <th>Nome</th>
                            <th>Situação do perfil</th>
                            <th>CPF</th>
                            <th>telefone</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <?php
                                if($permissaoPerfil !== "u") {
                                    ?>
                                        <th>Editar</th>
                                    <?php
                                }
                            ?>
                        </tr>                                                
                   <?php
                
                   while($row = mysqli_fetch_array($result)){
                        $idMatricula = $row['idcliente'];
                

                       ?>
                        
                        <tr>
                            <td><?php echo $row["nome"]?></td>
                            <td><?php if($row["situacao"] == 'a'){
                                echo "Ativo";
                            }else{
                                echo "Inativo";
                            }
                            ?></td>
                            <td><?php echo $row["cpf"]?></td>
                            <td><?php echo $row["telefone"]?></td>
                            <td><?php echo $row["email"]?></td>
                            <td><?php echo $row["estado"]?></td>
                            <td><?php echo $row["cidade"]?></td>
                            <?php
                            if($permissaoPerfil !== "u") {
                                    ?>
                                <td><a href="editar.php?idcliente=<?php echo $idMatricula ?>">...</a></td>
                                    <?php
                                }
                            ?> 
                           
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
        <a href="/app/clientes/cadastrar.php">Cadastrar cliente</a><br/>
        <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
    </body>
</html>
