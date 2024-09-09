<?php //session_start(); 
 include_once './validar_cliente.php';
 date_default_timezone_set('America/Sao_Paulo');
 
if($_SESSION["perfil"] == "user"){
 header("Location:Parnaioca/painel.php");
 die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <noscript>
        <!--no caso do JS tiver desativado, será redirecionado-->
        <meta http-equiv="refresh" content="0; url=noscript.php"/>
        </noscript>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/maskedinput-1.1.2.pack.js"></script>
        
        <script>        
        //só vai rodar o script quando o documento estiver pronto
        $(document).ready(function(){
            $("#f").validate(); //aplica a function validate ao #f
            $("#cpf").mask("999.999.999-99");
            $("#dtnasc").mask("99/99/9999");
        }//chave
    ); //parentese
        
        </script>
         <script type="text/javascript" src="js/cidades-estados-v0.2.js"></script> 
        <script type="text/javascript">
            window.onload = function () {
                new dgCidadesEstados(
                        document.getElementById('estado'),
                        document.getElementById('cidade'),
                        true
                        );
            }
        </script>
        <title></title>
    </head>
    <body>
        <?php
            $idcliente = $_GET["idcliente"];
            include_once './conexao.php';
            

                
            $sql = "select * from clientes where idcliente = ". $idcliente;            
            $result = mysqli_query($con, $sql);            
            $row = mysqli_fetch_array($result);
            $idcliente = $row['idcliente'];
                   
                  ?>        
        <h3>Editar Cadastro</h3>

        <form action="/clientes/atualizar_clientes.php" method="post">            
            
            
            <input type="hidden" readonly="true" name="idusuario" value="<?php echo $row["idcliente"] ?>"/>
            
             Nome:<br/>
            <input type="text" name="nome" class="required" minlength="3"/><br/>
            
            E-mail:<br/>
            <input type="text" name="email" class="required email"/><br/>
            
            Cpf:<br/>
            <input type="text" name="cpf" class="required" id="cpf"/><br/>
            
            Data de Nascimento:<br/>
            <input type="text" name="dtnasc" class="required" id="dtnasc"/><br/>
             
            Telefone:<br/>
            <input type="text" name="telefone"><br/>

            Estado:<br/>
            <select name="estado" id="estado">                
            </select>
            <br/>
            Cidade:<br/>
            <select name="cidade" id="cidade">
                <option value=""/>Escolha primeiro um estado
            </select>
            <br/>
                
            </select>
            
            Perfil:<br/>
            <input type="radio" name="perfil" value="a"/>Ativo
            <input type="radio" name="perfil" value="i"/>Inativo
            <br/>
            
           
            <input type="submit" value="Enviar" />
            
        </form>        
        
    </body>
</html>
