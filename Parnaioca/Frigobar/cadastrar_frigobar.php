<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Reserva</title>
        
        <noscript>
        <meta http-equiv="refresh" content="0; url=noscript.php"/>
        </noscript>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/maskedinput-1.1.2.pack.js"></script>
        
        <script>        
        
        $(document).ready(function(){
            $("#f").validate(); 
            $("#dataaquisicao").mask("99/99/9999");
        }
    ); 
    </script>
    </head>
    <body>
     
    <h3>Cadastrar frigobar em acomodações</h3>
      <form action="gravar_frigobar.php" method="post">
      
      Nome do frigobar:<br/>
      <input type="text" name="frigobar" class="required"><br/>

      Data de aquisição:<br/>
      <input type="text" name="aquisicao" class="required" id="dataaquisicao"><br/>

      Capacidade do Frigobar:<br/>
      <input type="text" name="tamanho" class="required"><br/>

      Acomodação do frigobar:<br/>
      <input type="text" name="acomodacao" class="required"><br/>

      <input type="submit" value="Enviar">

       
    </body>


</html>