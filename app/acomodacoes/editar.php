<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

date_default_timezone_set('America/Sao_Paulo');

if ($_SESSION["perfil"] == "u") {
    header("Location:/app/funcionarios/include/painel.php");
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Editar quarto</title>
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
    $acomodacao = $_GET["IDacomodacoes"];


    $sql = "select * from acomodacoes where idacomodacoes like '{$acomodacao}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $acomodacao = $row['idacomodacoes'];

    ?>
    <h3>Editar Acomodações</h3>

    <form action="/app/acomodacoes/include/aAcomodacoes.php" method="post" id="f">

        <input type="hidden" readonly="true" name="idacomodacoes" value="<?php echo $row["idacomodacoes"] ?>" />

        <input type="text" name="nome" placeholder="Nome da acomodação" value="<?php echo $row['nome'] ?>"><br /><br />

        <input type="text" name="valor" placeholder="Valor da diaria" value="<?php echo $row['valor'] ?>" /> <br /><br />

        <input type="text" name="capacidade" placeholder="Capacidade de hospedes" value="<?php echo $row['capacidade'] ?>" /><br /><br />

        Tipo de Acomodação:<br />
        <select name="tipo"></br>
            <option value="">Selecione</option>
            <option value="s">Suite</option>
            <option value="a">Apartamento</option>
        </select> <br />

        <input type="submit" value="Enviar" />

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>