<?php
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Frigobar</title>

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
            $("#dataaquisicao").mask("99/99/9999");
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

    <h3>Cadastrar frigobar em acomodações</h3>
    <form action="/app/frigobar/include/gFrigobar.php" method="post" id="f">

        <input type="text" name="frigobar" placeholder="Nome do frigobar"><br /><br/>

        <input type="text" name="aquisicao" class="required" id="dataaquisicao" placeholder="Data de aquisição"><br /><br/>

        <input type="text" name="tamanho" class="required" placeholder="Capacidade do frigobar"><br /><br/>

        <input type="text" name="acomodacao" class="required" placeholder="Nome da acomodação"><br /><br/>

        <input type="submit" value="Enviar">


</body>


</html>