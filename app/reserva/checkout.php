<?php 
include($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Checko-out</title>
    </head>
  <body>

      <form action="/app/reserva/include/gCheckout.php" method="post" id="f">

       Numero da reserva:<br/>
       <input type="text" name="idreserva" class="required"/><br/>    
       
       <input type="submit" name="Enviar"/>
  </body>

</html>