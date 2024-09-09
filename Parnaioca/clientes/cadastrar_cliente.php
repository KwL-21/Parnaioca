<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <noscript>
        <meta http-equiv="refresh" content="0; url=noscript.php"/>
        </noscript>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/maskedinput-1.1.2.pack.js"></script>
        
        <script>        
        $(document).ready(function(){
            $("#f").validate(); 
            $("#cpf").mask("999.999.999-99");
            $("#dtnasc").mask("99/99/9999");
        }
    ); 
    
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
        
        
        
        <style>
            label.error{
                color: red;
                font-size: 12px;
                margin-left: 5px;
            }
        </style>
        
    </head>
    <body>
        
        <h3>Cadastro de Clientes</h3>
        
        <form action="gravar_clientes.php" method="post" id="f">
    
            Nome:<br/>
            <input type="text" name="nome" class="required" minlength="3"/><br/>
            
            E-mail:<br/>
            <input type="text" name="email" class="required email"/><br/>
            
            Cpf:<br/>
            <input type="text" name="cpf" class="required" id="cpf"/><br/>
            
            Data de Nascimento:<br/>
            <input type="text" name="nascimento" class="required" id="nascimento"/><br/>
             
            Telefone:<br/>
            <input type="text" name="telefone" class="required" id="telefone"><br/>
 
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
            
            <br/>
            <input type="submit" value="Enviar"/>
            
        </form>
                
        <?php
        ?>
    </body>
</html>