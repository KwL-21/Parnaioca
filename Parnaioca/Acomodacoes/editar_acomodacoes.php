<?php //session_start(); 
 include_once './validar.php';
 date_default_timezone_set('America/Sao_Paulo');
 
if($_SESSION["perfil"] == "u"){
 header("Location:Parnaioca/painel.php");
 die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $acomodacao = $_GET["IDacomodacoes"];
            include_once './conexao.php';

                
            $sql = "select * from acomodacoes where idacomodacoes like '{$acomodacao}'";          
            $result = mysqli_query($con, $sql);            
            $row = mysqli_fetch_array($result);
            $acomodacao = $row['idacomodacoes'];
                   
                  ?>        
        <h3>Editar Acomodações</h3>

        <form action="atualizar_acomodacoes.php" method="post">            
            
        <input type="hidden" readonly="true" name="idacomodacoes" value="<?php echo $row["idacomodacoes"] ?>"/>
                     
            Acomodação:<br/>
            <input type="text" name="nome"><br/>

            Valor da Acomodação:<br/>
            <input type="text" name="valor"/> <br/>

            Capacidade:<br/>
            <input type="text" name="capacidade"/><br/> 

            Tipo de Acomodação:<br/>
            <select name="tipo"></br>   
               <option value="">Selecione</option>
               <option value="s">Suite</option>
               <option value="a">Apartamento</option>
            </select> <br/>
            
            <input type="submit" value="Enviar" />
            
        </form>        
        
    </body>
</html>
