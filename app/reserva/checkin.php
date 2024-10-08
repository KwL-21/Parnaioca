<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Check-in</title>

    <noscript>
        <meta http-equiv="refresh" content="0; url=noscript.php" />
    </noscript>

    <script src="/app/assets/js/jquery.min.js"></script>
    <script src="/app/assets/js/jquery.validate.js"></script>
    <script src="/app/assets/js/maskedinput-1.1.2.pack.js"></script>

    <script>
        $(document).ready(function() {
            $("#f").validate();
            $("#cpf").mask("999.999.999-99");
            $("#nascimento").mask("99/99/9999");
        });
    </script>

    <style>
        label.error {
            color: red;
            font-size: 12px;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <h3>Realizar check-in</h3>

    <form action="/app/reserva/include/gCheckin.php" method="post" id="f">

        Número da reserva:<br />
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

        Número de hospedes:<br />
        <input type="text" name="hospedes" class="required"><br />

        Placa do carro:<br />
        <input type="text" name="placa" class="required"><br />

        Forma de pagamento:<br />
        <select name="pagamento">
            <option value="">Selecione</option>
            <option value="Credito">Credito</option>
            <option value="Debito">Debito</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Pix">PIX</option>
        </select><br />
        <input type="submit" value="Enviar">
</body>