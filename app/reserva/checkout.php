<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Parnaioca - Check-out</title>
</head>

<body>

  <form action="/app/reserva/include/gCheckout.php" method="post" id="f">

    Numero da reserva:<br />
    <select name="idreserva" required>
      <option value="">Selecione uma reserva</option>
      <option value="%">Todas as reservas</option>
      <?php
      $sqlreserva = mysqli_query($con, "SELECT idreserva FROM reserva");


      while ($reservas = mysqli_fetch_assoc($sqlreserva)) {
      ?>
        <option value="<?php echo $reservas['idreserva'] ?>"><?php echo $reservas['idreserva'] ?></option>
      <?php
      }
      ?>
    </select><br />

    <input type="submit" name="Enviar" />
</body>

</html>