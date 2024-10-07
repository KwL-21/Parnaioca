<?php 
include($_SERVER['DOCUMENT_ROOT'].'/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Cadastrar reserva</title>
        
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
            <select name="acomodacoes" required>
                <option value="">Selecione um quarto</option>
                <?php
                $sqlquarto = mysqli_query($con, "SELECT nome FROM acomodacoes");
                

                while($quartos = mysqli_fetch_assoc($sqlquarto)){
                    ?>
                    <option value="<?php echo $quartos['nome']?>"><?php echo $quartos['nome'] ?></option>
                    <?php
                    }
                    ?>
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