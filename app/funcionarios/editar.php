<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/app/config/validar.php');

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
        <title></title>

        <noscript>
        <meta http-equiv="refresh" content="0; url=noscript.php"/>
        </noscript>
        
        <script src="/app/assets/js/jquery.min.js"></script>
        <script src="/app/assets/js/jquery.validate.js"></script>
        <script src="/app/assets/js/maskedinput-1.1.2.pack.js"></script>
        
        <script>        
        $(document).ready(function(){
            $("#f").validate(); 
            $("#cpf").mask("999.999.999-99");
            $("#nascimento").mask("99/99/9999");
        }
    ); 
    
        </script>
             
        <style>
            label.error{
                color: red;
                font-size: 12px;
                margin-left: 5px;
            }
        </style>
    </head>
    <body>
        <?php
            $idUsuario = $_GET["idMatricula"];

                
            $sql = "select * from funcionarios where matricula = ". $idUsuario;            
            $result = mysqli_query($con, $sql);            
            $row = mysqli_fetch_array($result);
            $idUsuario = $row['matricula'];
                   
                  ?>        
        <h3>Editar Cadastro</h3>

        <form action="/app/funcionarios/include/aFuncionario.php" method="post" id="f">            
            
            
            <input type="hidden" readonly="true" name="idusuario" value="<?php echo $row["matricula"] ?>"/>
                   
            Login:<br/>
            <input type="text" name="login" /><br/>
            
            CPF:<br/>
            <input type="text" name="cpf"/><br/>

            Email:<br/>
            <input type="text" name="email"/> <br/>

            Senha:<br/>
            <input type="password" name="senha"/><br/>
            
            Perfil:<br/>
            <input type="radio" name="perfil" value="a"/>Administrador
            <input type="radio" name="perfil" value="u"/>Usuário
            <br/>
            
           
            <input type="submit" value="Enviar" />
            
        </form>        
        
    </body>
</html>
