<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca</title>

    </head>
    <body>
        
        <h4>Cadastro de Acomodações</h4>
        
        <form action="gravar_acomodacoes.php" method="post">
                    
            Acomodação:<br/>
            <input type="text" name="acomodacoes" required/><br/>

            Valor da Acomodação:<br/>
            <input type="text" name="valor" required/> <br/>

            Capacidade:<br/>
            <input type="text" name="capacidade" required/><br/> 
            
            Tipo de Acomodação:<br/>
            <select name="tipo"></br>   
               <option value="">Selecione</option>
               <option value="s">Suite</option>
               <option value="a">Apartamento</option>
            </select> <br/>

            <input type="submit" value="Enviar" />
            
        </form>
        
        <?php
        ?>
    </body>
</html>