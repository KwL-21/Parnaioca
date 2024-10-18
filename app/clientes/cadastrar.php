<?php
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Cadastrar cliente</title>
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
    <script type="text/javascript" src="/app/assets/js/cidades-estados-v0.2.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            new dgCidadesEstados(
                document.getElementById('estado'),
                document.getElementById('cidade'),
                true
            );
        }
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

    <h4>Cadastro de Clientes</h4>

    <form action="/app/clientes/include/gClientes.php" method="post" id="f">

        <input type="text" name="nome" placeholder="Nome do cliente" class="required" minlength="3" /><br /><br/>

        <input type="text" name="email" placeholder="Email" class="required email" /><br /><br/>

        <input type="text" name="cpf" placeholder="CPF" class="required" id="cpf" /><br /><br/>

        <input type="text" name="nascimento" placeholder="Data de nascimento" class="required" id="nascimento" /><br /><br/>

        <input type="text" name="telefone" placeholder="Telefone" class="required" id="telefone"><br />

        Estado:<br />
        <select name="estado" id="estado">
        </select>
        <br /><br/>
        <select name="cidade" id="cidade">
            <option value="" />Escolha primeiro um estado
        </select>
        <br />

        </select>

        <br />
        <button type="submit" class="btn btn-success" name="Enviar">Enviar</button>

    </form>

    <?php
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>