<?php
include('../config/conexao.php');
include('../../login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];

date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - consultar frigobar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script>
        function excluir(mat) {

            if (confirm('Deseja realmente excluir ?')) {
                location.href = 'excluir.php?idusuario=' + mat;
            }

        }
    </script>


</head>

<body>
    <h3>Consulta de Registro</h3>

    <form action="consulteF.php" method="get">

        Nome:
        <select name="nome" required>
            <option value="">Selecione um frigobar</option>
            <option value="%">Todos os frigobares</option>
            <?php
            $sqlfrigobar = mysqli_query($con, "SELECT nome FROM frigobar");


            while ($frigobar = mysqli_fetch_assoc($sqlfrigobar)) {
            ?>
                <option value="<?php echo $frigobar['nome'] ?>"><?php echo $frigobar['nome'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="Enviar" />
    </form>

    <?php
    if (!empty($_GET["nome"])) {
        $login = $_GET["nome"];


        $sql = "select * from frigobar where nome like '%{$login}%'";
        $result = mysqli_query($con, $sql);
        $totalregistros = mysqli_num_rows($result);

        if ($totalregistros > 0) {
    ?>
            <table width="900px" border="1px">
                <tr>
                    <th>Id do frigobar</th>
                    <th>Nome do frigobar</th>
                    <th>Acomodação do frigobar</th>
                    <th>Capacidade do frigobar</th>
                    <th>Compra do frigobar</th>
                </tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $idMatricula = $row['nome'];


                ?>

                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nome"] ?></td>
                        <td><?php echo $row["acomodacao"] ?></td>
                        <td><?php echo $row["capacidade"] ?></td>
                        <td><?php echo $row["dataaquisicao"] ?></td>
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
    <a href="./frigobar.php">Cadastrar frigobar</a><br />
    <a href="./index.php">Area frigobar</a><br />
    <a href="../funcionarios/include/painel.php">Pagina Inicial</a>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</body>

</html>