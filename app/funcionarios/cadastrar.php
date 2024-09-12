<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca</title>

        <noscript>
        <meta http-equiv="refresh" content="0; url=noscript.php"/>
        </noscript>
        
        <script src="/app/assets/js/jquery.min.js"></script>
        <script src="/app/assets/js/jquery.validate.js"></script>
        <script src="/app/assets/js/maskedinput-1.1.2.pack.js"></script>

        <script>
            $(document).ready(function () {
                $("#enviar").click(function () {
                    var vlogin = $("#login").val();
                    var vsenha = $("#senha").val();


                    $.post('gravar.php',
                            {nome: vnome,
                                email: vemail,
                                dtnasc: vdtnasc,
                                login: vlogin,
                                senha: vsenha},
                            function (resp) {
                                $("#resposta").html(resp);
                            }
                    );
                });

                $("#login").keyup(function () {
                    var vlogin = $("#login").val();
                    $.post('/app/funcionarios/include/verificarlogin.php',
                            {login: vlogin},
                            function (resp) {
                                $("#verificacao").html(resp);
                            }
                    );
                });
            });
        </script>
        
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
        
        <h4>Cadastro de Usuário</h4>
        
        <form action="/app/funcionarios/include/gFuncionarios.php" method="post" id="f">
           
           Login:<br/>
        <input type="text" name="login" id="login"/>
            <span id="verificacao"></span>
            <br/>
            
            CPF:<br/>
            <input type="text" name="cpf" class="required" id="cpf"/><br/>

            Email:<br/>
            <input type="text" name="email" class="required email"/> <br/>

            Senha:<br/>
            <input type="password" name="senha"/><br/>
            
            Perfil:<br/>
            <input type="radio" name="perfil" value="a" class="required" id="adm"/>Administrador
            <input type="radio" name="perfil" value="u" class="required" id="user"/>Usuário
            <br/>
        
            
            <input type="submit" value="Enviar" />
            
        </form>
        
        <?php
        ?>
    </body>
</html>