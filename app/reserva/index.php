<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script>
        function excluir(mat) {

            if (confirm('Deseja realmente excluir ?' + mat)) {
                location.href = 'excluir.php?idusuario=' + mat;
            }

        }
    </script>


</head>

<body>
    <h3>Consulta de Reserva</h3>

    <form action="index.php" method="get">

        Número da reserva:
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
        </select>
        <input type="submit" name="Enviar" />
    </form>

    <?php

    if (!empty($_GET["idreserva"])) {
        $Acomodacao = $_GET["idreserva"];


        $sql = "select * from reserva where idreserva like '%{$Acomodacao}%'";
        $result = mysqli_query($con, $sql);
        $totalregistros = mysqli_num_rows($result);

        if ($totalregistros > 0) {
    ?>
            <table width="900px" border="1px">
                <tr>
                    <th>Acomodação</th>
                    <th>Cliente</th>
                    <th>CPF</th>
                    <th>Data de Inicio</th>
                    <th>Data de Termino</th>
                    <th>Situação</th>
                    <?php
                    if ($permissaoPerfil !== "u") {
                    ?>
                        <th>Editar</th>
                    <?php
                    }
                    ?>
                </tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $idMatricula = $row['idreserva'];

                    $Cliente = $row['cliente'];
                    $nome = mysqli_query($con, "SELECT nome FROM clientes WHERE cpf like '%{$Cliente}%'");
                    $assoc = mysqli_fetch_assoc($nome);


                ?>

                    <tr>
                        <td><?php echo $row["Acomodacoes"] ?></td>
                        <td><?php echo $assoc['nome'] ?></td>
                        <td><?php echo $row["cliente"] ?></td>
                        <td><?php echo $row["inicio"] ?></td>
                        <td><?php echo $row["final"] ?></td>
                        <td><?php echo $row["situacao"] ?></td>
                        <?php
                        if ($permissaoPerfil !== "u") {
                        ?>
                            <td><a href="/app/reserva/editar.php?idReserva=<?php echo $idMatricula ?>">...</a></td>
                        <?php
                        }
                        ?>
                    </tr>

                <?php
                }
                echo "</table>";
                ?>
            </table>
    <?php

            echo "Total de registros: " . $totalregistros;
        } else {
            echo "Nenhum registro encontrado!";
        }

        mysqli_close($con);
    }
    ?>
    <hr />
    <a href="/app/reserva/reserva.php">Realizar reserva</a></br>
    <a href="/app/reserva/checkin.php">Realizar check-in</a></br>
    <a href="/app/reserva/checkout.php">Realizar check-out</a></br>
    <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>