<?php
include_once './validar.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consulta frigobar</title>
    </head>
    <body>
        <h3>Consulta de itens no frigobar</h3>

        <form action="Consultar_itens.php" method="post">
             
            ID do frigobar:
            <input type="text" name="idfrigobar"/>
            <input type="submit" value="Enviar"/>
                   
        </form>

        <hr/>

        <?php 
         if(!empty($_GET["idfrigobar"])){
            $idfrigobar = $_GET["idfrigobar"];

            include_once './conexao.php';

            $sql = "SELECT * FROM estoque_frigobar WHERE id LIKE '{$idfrigobar}'";

            $result = mysqli_query($con, $sql);
            $totalregistros = mysqli_num_rows($result);

            if($totalregistros > 0){
        ?>
           <table width="900px" border="1px">    
              <tr>
                   <th>Id do frigobar</th>
                   <th>Id do produto</th>
                   <th>Quantidade de produtos</th>
              </tr>
        <?php

         while($row = mysqli_fetch_assoc($result)){
            $idfrigobar = $row['idfrigobar'];
            ?>
         <tr>
            <td><?php echo $row['idfrigobar'] ?></td>
            <td><?php echo $row['idprodutos'] ?></td>
            <td><?php echo $row['quantidade'] ?></td>
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