<?php
include($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
?>



<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar quarto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script>
        function excluir(mat) {

            if (confirm('Deseja realmente excluir ?')) {
                location.href = '/app/acomodacoes/include/eAcomodacoes.php?IDacomodacoes=' + mat;
            }

        }
    </script>


</head>

<body>
    <h3>Consulta de acomodações</h3>

    <form action="index.php" method="get">
        <select name="nome" required>
            <option value="">Selecione um quarto</option>
            <option value="%">Todos os quartos</option>
            <?php
            $sqlquarto = mysqli_query($con, "SELECT nome FROM acomodacoes");


            while ($quartos = mysqli_fetch_assoc($sqlquarto)) {
            ?>
                <option value="<?php echo $quartos['nome'] ?>"><?php echo $quartos['nome'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="Enviar" />
    </form>


    <?php
    if (!empty($_GET["nome"])) {
        $Nome = $_GET["nome"];


        $sql = "select * from acomodacoes where nome like '%{$Nome}%'";
        $result = mysqli_query($con, $sql);
        $totalregistros = mysqli_num_rows($result);

        if ($totalregistros > 0) {
    ?>
            <table width="900px" border="1px">
                <tr>
                    <th>Nome da Acomodação</th>
                    <th>Valor da Acomodação</th>
                    <th>Capacidade</th>
                    <th>Tipo de Acomodação</th>

                    <?php
                    if ($permissaoPerfil !== "u") {
                    ?>
                        <th>Editar</th>
                        <th>Excluir</th>
                    <?php
                    }
                    ?>
                </tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $Idacomodacoes = $row['idacomodacoes'];


                ?>

                    <tr>
                        <td><?php echo $row["nome"] ?></td>
                        <td><?php echo $row["valor"] ?></td>
                        <td><?php echo $row["capacidade"] ?></td>
                        <td><?php if ($row["tipo"] == 's') {
                                echo "Suite";
                            } else {
                                echo "Apartamento";
                            }
                            ?></td>
                        <?php
                        if ($permissaoPerfil !== "u") {
                        ?>
                            <td><a href="editar.php?IDacomodacoes=<?php echo $Idacomodacoes ?>">...</a></td>
                            <td><a href="#" onclick="excluir(<?php echo $Idacomodacoes ?>)">X</a></td>
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
    <a href="/app/acomodacoes/cadastrar.php">Cadastrar acomodação</a> </br>
    <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>