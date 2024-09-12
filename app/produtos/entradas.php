<!DOCTYPE html>
<html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Entradas e Saidas</title>

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
     
    <form action="/app/produtos/include/gEntradas.php" method="post" id="f">

    Nome do produto:<br/>
    <input type="text" name="nome" class="required"/><br/>
    
    Quantidade de produtos recebidos:<br/>
    <input type="text" name="entradas" class="required"/><br/>

    Data da compra:<br/>
    <input type="text" name="dtcompra" class="required" id="compra"/><br/>
    
    <input type="submit" value="Enviar"/>
 </body>
</html>
