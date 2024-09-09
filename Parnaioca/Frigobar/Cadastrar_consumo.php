<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consumo</title>
    </head>
    <body>

       <form action="gravar_consumo.php" method="post">
           
        Nome acomodação:<br/>
        <input type="text" name="acomodacao" class="required"/><br/>

        Número da reserva:<br/>
        <input type="text" name="idreserva" class="required"/><br/>

        Nome do produto:<br/>
        <input type="text" name="produto" class="required"/><br/>

        ID do frigobar:<br/>
        <input type="text" name="idfrigobar" class="required"/><br/>

        Quantidade consumida:<br/>
        <input type="text" name="quantidade" class="required"/><br/>

        <input type="submit" value="Enviar"/>

       </form>
    </body>
</html>