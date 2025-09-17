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

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css"/>
        <!-- jQuery -->
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>
        <!-- DataTables JS -->
        <script src="../../assets/vendor/jquery-datatable/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <h3>Consulta de Registro</h3>

    <?php
    $sql = "SELECT * FROM produtos";
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
                            <th class="align-center">Nome do produto</th>
                            <th class="align-center">Quantidade em estoque</th>
                            <th class="align-center">Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = mysqli_fetch_array($result)) { ?>
                        <tr class="font-12">
                            <td class="align-center"><?php echo $i++; ?></td>
                            <td class="align-center"><?php echo $row["nome"] ?></td>
                            <td class="align-center"><?php echo  $row["estoque"] ?></td>
                            <td class="align-center"><?php echo "R$" . $row["valorunitario"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div>Total de registros: <?php echo $totalregistros; ?></div>
            <hr />
            <a href="./cadastrar.php">Cadastrar produto</a> <br />
            <a href="../funcionarios/include/painel.php">Pagina Inicial</a>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    responsive: true,
                    language: {
                        url: '../../assets/vendor/jquery-datatable/Portuguese-Brasil.json'
                    }
                });
            });
        </script>
</body>
</html>