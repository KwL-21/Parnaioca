<?php
include_once('../config/conexao.php');
include('../../login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar funcionarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css"/>
        <!-- jQuery -->
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>
        <!-- DataTables JS -->
        <script src="../../assets/vendor/jquery-datatable/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js"></script>
    <script>
        function excluir(mat) {

            if (confirm('Deseja realmente excluir ?')) {
                location.href = './include/eFuncionario.php?idusuario=' + mat;
            }

        }
    </script>


</head>

<body>
    <h3>Consulta de Registro</h3>

    <?php
    $sql = "SELECT * FROM funcionarios";
    $result = mysqli_query($con, $sql);
    $totalregistros = mysqli_num_rows($result);
    ?>
    <div class="card">
        <div class="body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable table-sm" id="datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="align-center">#</th>
                            <th class="align-center">Login</th>
                            <th class="align-center">Perfil</th>
                            <?php if ($permissaoPerfil !== "u") { ?>
                                <th class="align-center">Editar</th>
                                <th class="align-center">Excluir</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = mysqli_fetch_array($result)) { $idFuncionario = $row['matricula']; ?>
                        <tr class="font-12">
                            <td class="align-center"><?php echo $i++; ?></td>
                            <td class="align-center"><?php echo $row["login"] ?></td>
                            <td class="align-center"><?php echo ($row['perfil'] == 'u') ? 'Usuário' : 'Administrador'; ?></td>
                            <?php if ($permissaoPerfil !== "u") { ?>
                                <td class="align-center">
                                    <a href="editar.php?idusuario=<?php echo $idFuncionario ?>" class="pointer">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td class="align-center">
                                    <a href="#" onclick="excluir(<?php echo $idFuncionario ?>)" class="pointer">
                                        <i class="fa fa-trash text-dark"></i>
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div>Total de registros: <?php echo $totalregistros; ?></div>
            <hr />
            <a href="./cadastrar.php">Cadastrar funcionário</a> <br />
            <a href="./include/painel.php">Pagina Inicial</a>
        </div>
    </div>
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
                            <td><a href="./editar.php?idMatricula=<?php echo $idMatricula ?>">...</a></td>
                            <td><a href="#" onclick="excluir(<?php echo $Idacomodacoes ?>)">X</a></td>
                        <?php
                        }
                        ?>
                    </tr>


                <?php
                }
                ?>
            </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

</body>

</html>