<?php
include('../config/conexao.php');
include('../../login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
?>



<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar quarto</title>
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
                location.href = './include/eAcomodacoes.php?IDacomodacoes=' + mat;
            }

        }
    </script>


</head>

<body>
    <h3>Consulta de acomodações</h3>

    <?php
    $sql = "SELECT * FROM acomodacoes";
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
                            <th class="align-center">Nome da Acomodação</th>
                            <th class="align-center">Valor</th>
                            <th class="align-center">Capacidade</th>
                            <th class="align-center">Tipo</th>
                            <?php if ($permissaoPerfil !== "u") { ?>
                                <th class="align-center">Editar</th>
                                <th class="align-center">Excluir</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = mysqli_fetch_array($result)) { $idAcomodacao = $row['idacomodacoes']; ?>
                        <tr class="font-12">
                            <td class="align-center"><?php echo $i++; ?></td>
                            <td class="align-center"><?php echo $row["nome"] ?></td>
                            <td class="align-center"><?php echo $row["valor"] ?></td>
                            <td class="align-center"><?php echo $row["capacidade"] ?></td>
                            <td class="align-center"><?php echo ($row["tipo"] == 's') ? 'Suite' : 'Apartamento'; ?></td>
                            <?php if ($permissaoPerfil !== "u") { ?>
                                <td class="align-center">
                                    <a href="editar.php?IDacomodacoes=<?php echo $idAcomodacao ?>" class="pointer">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td class="align-center">
                                    <a href="#" onclick="excluir(<?php echo $idAcomodacao ?>)" class="pointer">
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
            <a href="./cadastrar.php">Cadastrar acomodação</a> </br>
            <a href="../funcionarios/include/painel.php">Pagina Inicial</a>
        </div>
    </div>
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