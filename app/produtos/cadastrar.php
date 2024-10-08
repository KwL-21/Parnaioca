<?php
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar produtos</title>

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

    <form action="/app/produtos/include/gProdutos.php" method="post" id="f">

        Nome do produto:<br />
        <input type="text" name="nome" class="required" /><br />

        Valor pago:<br />
        <input type="text" name="valorpago" class="required" /><br />

        Quantidade comprada:<br />
        <input type="text" name="entrada" class="required" /><br />

        Marca do produto:<br />
        <input type="text" name="marca" class="required" /><br />

        Porcentagem de lucro:<br />
        <input type="text" name="porcento" /><br />


        <input type="submit" value="Enviar" /><br />

</body>

</html>