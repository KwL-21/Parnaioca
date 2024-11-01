<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Parnaioca - Check-out</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>