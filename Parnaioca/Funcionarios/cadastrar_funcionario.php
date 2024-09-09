<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca</title>
        <noscript>
        <!--no caso do JS tiver desativado, será redirecionado-->
        <meta http-equiv="refresh" content="0; url=noscript.php"/>
        </noscript>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/maskedinput-1.1.2.pack.js"></script>
        <script>
            $(document).ready(function () {
                $("#enviar").click(function () {
                    //alert('teste');
                    var vnome = $("#nome").val();
                    var vemail = $("#email").val();
                    var vdtnasc = $("#dtnasc").val();
                    var vlogin = $("#login").val();
                    var vsenha = $("#senha").val();

                    //alert(vnome);

                    //$.post('url',{dados},'resposta')
                    $.post('gravar.php',
                            {nome: vnome,
                                email: vemail,
                                dtnasc: vdtnasc,
                                login: vlogin,
                                senha: vsenha},
                            function (resp) {
                                //resp: o que veio do gravar
                                $("#resposta").html(resp);
                            }
                    );
                });

                //$("#verificar").click(function(){
                //$("#login").change(function(){
                $("#login").keyup(function () {
                    var vlogin = $("#login").val();
                    $.post('verificarlogin_funcionario.php',
                            {login: vlogin},
                            function (resp) {
                                //resp: o que veio do gravar
                                $("#verificacao").html(resp);
                            }
                    );
                });
                $("#dtnasc").mask("99/99/9999");
            });
        </script>
        
        <script>        
        //só vai rodar o script quando o documento estiver pronto
        $(document).ready(function(){
            $("#f").validate(); //aplica a function validate ao #f
            $("#cpf").mask("999.999.999-99");
            $("#dtnasc").mask("99/99/9999");
        }//chave
    ); //parentese
        
        </script>
    </head>
    <body>
        
        <h4>Cadastro de Usuário</h4>
        
        <form action="gravar.php" method="post">
           
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
        // put your code here
        ?>
    </body>
</html>