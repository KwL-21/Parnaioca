<?php 
 include_once './validar.php';
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
    </head>
    <body>
        <?php
            $idUsuario = $_GET["idMatricula"];
            include_once './conexao.php';

                
            $sql = "select * from funcionarios where matricula = ". $idUsuario;            
            $result = mysqli_query($con, $sql);            
            $row = mysqli_fetch_array($result);
            $idUsuario = $row['matricula'];
                   
                  ?>        
        <h3>Editar Cadastro</h3>

        <form action="atualizar_funcionarios.php" method="post">            
            
            
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
