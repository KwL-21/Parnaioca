<?php
include('../config/conexao.php');
include('../../login/validar.php');
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h3>Consulta de Registro</h3>

    <form action="index.php" method="get">

        Nome:
        <select name="nome" required>
            <option value="">Selecione um produto</option>
            <option value="%">Todos os produtos</option>
            <?php
            $sqlprod = mysqli_query($con, "SELECT nome FROM produtos");


            while ($produtos = mysqli_fetch_assoc($sqlprod)) {
            ?>
                <option value="<?php echo $produtos['nome'] ?>"><?php echo $produtos['nome'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="Enviar" />
    </form>

    <?php
    if (!empty($_GET["nome"])) {
        $login = $_GET["nome"];


        $sql = "select * from produtos where nome like '%{$login}%'";
        $result = mysqli_query($con, $sql);
        $totalregistros = mysqli_num_rows($result);

        if ($totalregistros > 0) {

    ?>
            <table width="900px" border="1px">
                <tr>
                    <th>Nome do produto</th>
                    <th>Quantidade em estoque</th>
                    <th>Preço</th>
                </tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $idfrigobar = $row['idproduto'];


                ?>

                    <tr>
                        <td><?php echo $row["nome"] ?></td>
                        <td><?php echo  $row["estoque"] ?></td>
                        <td><?php echo "R$" . $row["valorunitario"] ?></td>
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
    <a href="./cadastrar.php">Cadastrar produtos</a><br />
    <a href="./entradas.php">Registrar entradas</a><br />
    <a href="../funcionarios/include/painel.php">Pagina Inicial</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>