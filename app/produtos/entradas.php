<?php
include('../../login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Cadastrar entradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    <form action="./include/gEntradas.php" method="post" id="f">

        Nome do produto:<br />
        <input type="text" name="nome" class="required" /><br />

        Quantidade de produtos recebidos:<br />
        <input type="text" name="entradas" class="required" /><br />


        <input type="submit" value="Enviar" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>