<?php
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Cadastrar quarto</title>

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

    <h4>Cadastro de Acomodações</h4>

    <form action="/app/acomodacoes/include/gAcomodacoes.php" method="post" id="f">

        Acomodação:<br />
        <input type="text" name="acomodacoes" required /><br />

        Valor da Acomodação:<br />
        <input type="text" name="valor" required /> <br />

        Capacidade:<br />
        <input type="text" name="capacidade" required /><br />

        Tipo de Acomodação:<br />
        <select name="tipo"></br>
            <option value="">Selecione</option>
            <option value="s">Suite</option>
            <option value="a">Apartamento</option>
        </select> <br />

        <input type="submit" value="Enviar" />

    </form>

    <?php
    ?>
</body>

</html>