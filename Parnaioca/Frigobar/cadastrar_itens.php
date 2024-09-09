<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Estoque do frigobar</title>
    </head>
    <body>
     
        <h3>Cadastro de itens no estoque</h3>
          <form action="gravar_itens.php" method="post">
          
          ID do frigobar:<br/>
          <input type="text" name="idfrigobar" class="required"><br/>

          Nome do produto:<br/>
          <input type="text" name="nomeproduto" class="required"><br/>

          Quantidade de produtos:<br/>
          <input type="text" name="quantidade" class="required"><br/>

          <input type="submit" value="Enviar">
          </form>
    </body>
</html>