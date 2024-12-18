<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar itens</title>
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

    <form action="consulteI.php" method="get">

        Nome:
        <select name="idprodutos" required>
            <option value="">Selecione um produto</option>
            <option value="%">Todos os produtos</option>
            <?php
            $sqlitens = mysqli_query($con, "SELECT idprodutos FROM estoque_frigobar");


            while ($itens = mysqli_fetch_assoc($sqlitens)) {
            ?>
                <option value="<?php echo $itens['idprodutos'] ?>"><?php echo $itens['idprodutos'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="Enviar" />
    </form>

    <?php
    if (!empty($_GET["idprodutos"])) {
        $idprodutos = $_GET["idprodutos"];


        $sql = "select * from estoque_frigobar where idprodutos like '%{$idprodutos}%'";
        $result = mysqli_query($con, $sql);
        $totalregistros = mysqli_num_rows($result);

        if ($totalregistros > 0) {
            $prod = "SELECT * FROM produtos WHERE idproduto LIKE '{$idprodutos}' ";
            $resultprod = mysqli_query($con, $prod);
            $row1 = mysqli_fetch_assoc($resultprod);
            $nomeprod = $row1['nome'];
        }

        if ($totalregistros > 0) {
    ?>
            <table width="900px" border="1px">
                <tr>
                    <th>Numero do frigobar</th>
                    <th>Nome do Produto</th>
                    <th>Estoque</th>
                </tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $idprod = $row['idprodutos'];


                ?>

                    <tr>
                        <td><?php echo $row["idfrigobar"] ?></td>
                        <td><?php echo $nomeprod ?></td>
                        <td><?php echo $row["quantidade"] ?></td>
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
    <a href="/app/frigobar/itens.php">Cadastrar itens no frigobar</a><br />
    <a href="/app/frigobar/consumo.php">Cadastrar consumo</a><br />
    <a href="/app/frigobar/index.php">Area frigobar</a><br />
    <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</body>

</html>