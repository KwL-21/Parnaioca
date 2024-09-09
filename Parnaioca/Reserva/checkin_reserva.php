<!DOCTYPE html>
 <html>
   <head> 
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Check-in</title>       
   </head>
   <body>
        <h3>Realizar check-in</h3>
    
   <form action="gravar_checkin.php" method="post">

   Número da reserva:<br/>
   <input type="text" name="idreserva" class="required"/><br/>

   Número de hospedes:<br/>
   <input type="text" name="hospedes" class="required"><br/>

   Placa do carro:<br/>
   <input type="text" name="placa" class="required"><br/>

   Forma de pagamento:<br/>
           <select name="pagamento">
                <option value="">Selecione</option>
                <option value="Credito">Credito</option>
                <option value="Debito">Debito</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Pix">PIX</option>
            </select><br/>
            <input type="submit" value="Enviar">
   </body>