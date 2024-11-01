<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

if ($_SESSION["perfil"] == "user") {
    header("Location:Parnaioca/painel.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Editar reserva</title>
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
    <?php
    $idMatricula = $_GET["idReserva"];

    $sql = "select * from reserva where idReserva = " . $idMatricula;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $idMatricula = $row['idreserva'];
    ?>
    <h3>Editar Cadastro</h3>

    <form action="/app/reserva/include/aReserva.php" method="post" id="f">

        <input type="hidden" readonly="true" name="idusuario" value="<?php echo $row['idreserva'] ?>" />

        <select name="acomodacoes">
            <option value="">Selecione</option>
            <option value="Suite_parnaioca">Suite Parnaioca</option>
            <option value="Suite_Lagoa_azul">Suite Lagoa azul</option>
            <option value="Suite_Lopes_Mendes">Suite Lopes Mendes</option>
            <option value="Apartamento_1">Apartamento 1</option>
            <option value="Apartamento_2">Apartamento 2</option>
            <option value="Apartamento_3">Apartamento 3</option>
            <option value="Apartamento_4">Apartamento 4</option>
            <option value="Apartamento_5">Apartamento 5</option>
            <option value="Apartamento_6">Apartamento 6</option>
            <option value="Apartamento_7">Apartamento 7</option>
            <option value="Apartamento_8">Apartamento 8</option>
            <option value="Apartamento_9">Apartamento 9</option>
            <option value="Apartamento_10">Apartamento 10</option>
        </select><br />

        Data de Inicio:<br />
        <input type="text" name="inicio" class="required" id="dtinicio" value="<?php echo $row['inicio'] ?>" /><br />

        Data de Termino:<br />
        <input type="text" name="final" class="required" id="dtfinal" value="<?php echo $row['final'] ?>" /><br />

        Cpf:<br />
        <input type="text" name="cpf" class="required" id="cpf" value="<?php echo $row['cliente'] ?>" /><br />

        Situação da reserva:<br />
        <input type="radio" name="situacao" value="cancelado" />Cancelar reserva
        <input type="radio" name="situacao" value="ocupado" />Uso imediato
        <input type="radio" name="situacao" value="reservado" /> Reservar acomodação
        <br />


        <input type="submit" value="Enviar" />

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>