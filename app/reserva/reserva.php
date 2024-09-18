<?php 
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Reserva</title>
        
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
            $("#dtinicio").mask("99/99/9999");
            $("#dtfinal").mask("99/99/9999");
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
        
        <h3>Cadastro de Reserva</h3>
        
        <form action="/app/reserva/include/gReserva.php" method="post" id="f">
        
        Acomodação:<br/>
        <select name="acomodacoes">
            <option value="">Selecione</option>
                <option value="Suite_parnaioca">Suite Parnaioca</option>
                <option value="Suite_Lagoa_azul">Suite Lagoa azul</option>
                <option value="Suite_Lopes_Mendes">Suite Lopes Mendes</option>
                <option value="Apartamento_1">Apartamento 1</option>
                <option value="Apartamento_2">Apartamento 2</option>
                <option value="Apartamento_3">Apartamento 3</option>
                <option value="Apartamento_4">Apartamento 4</option>
                <option value="Apartamento_5">Apartamento 5</option>
                <option value="Apartamento_6">Apartamento 6</option>
                <option value="Apartamento_7">Apartamento 7</option>
                <option value="Apartamento_8">Apartamento 8</option>
                <option value="Apartamento_9">Apartamento 9</option>
                <option value="Apartamento_10">Apartamento 10</option>
            </select><br/>
            
            Data de Inicio:<br/>
            <input type="text" name="inicio" class="required" id="dtinicio"/><br/>
            
            Data de Termino:<br/>
            <input type="text" name="final" class="required" id="dtfinal"/><br/>
            
            Cpf:<br/>
            <input type="text" name="cpf" class="required" id="cpf"/><br/>

            <input type="submit" value="Enviar"/>
            
        </form>
                
        <?php
        ?>
    </body>
</html>