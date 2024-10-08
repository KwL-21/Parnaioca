<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/config/conexao.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar funcionarios</title>

    <script>
        function excluir(mat) {

            if (confirm('Deseja realmente excluir ?')) {
                location.href = '/app/funcionarios/include/eFuncionario.php?idusuario=' + mat;
            }

        }
    </script>


</head>

<body>
    <h3>Consulta de Registro</h3>

    <form action="index.php" method="get">

        Nome:
        <select name="login" required>
            <option value="">Selecione um funcionario</option>
            <option value="%">Todos os funcionarios</option>
            <?php
            $sqlfuncionario = mysqli_query($con, "SELECT login FROM funcionarios");


            while ($funcionario = mysqli_fetch_assoc($sqlfuncionario)) {
            ?>
                <option value="<?php echo $funcionario['login'] ?>"><?php echo $funcionario['login'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="Enviar" />
    </form>

    <?php
    if (!empty($_GET["login"])) {
        $login = $_GET["login"];


        $sql = "select * from funcionarios where login like '%{$login}%'";
        $result = mysqli_query($con, $sql);
        $totalregistros = mysqli_num_rows($result);

        if ($totalregistros > 0) {
    ?>
            <table width="900px" border="1px">
                <tr>
                    <th>login</th>
                    <th>Perfil</th>
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
                    $idMatricula = $row['matricula'];


                ?>

                    <tr>
                        <td><?php echo $row["login"] ?></td>
                        <td><?php if ($row['perfil'] == 'u') {
                                echo "Usuario";
                            } else {
                                echo "administrador";
                            }
                            ?></td>
                        <?php
                        if ($permissaoPerfil !== "u") {
                        ?>
                            <td><a href="editar.php?idMatricula=<?php echo $idMatricula ?>">...</a></td>
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
    <a href="/app/funcionarios/cadastrar.php">Cadastrar funcionarios</a> <br />
    <a href="/app/funcionarios/include/painel.php">Pagina Inicial</a>
</body>

</html>