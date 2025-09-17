

<?php
include('../config/conexao.php');
include('../../login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
$sql = "SELECT * FROM reserva r
INNER JOIN clientes c ON r.cliente = c.cpf
INNER JOIN acomodacoes a ON r.Acomodacoes = a.nome";
$result = mysqli_query($con, $sql);
$totalregistros = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - Consultar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css"/>
    <!-- jQuery -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="../../assets/vendor/jquery-datatable/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="card">
        <div class="body">
            <div class="row justify-content-end mr-2 pb-2">
                <a onclick="abrirHistorico()"><small><i class="fa fa-history"></i> Histórico</small></a>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Filtro de empresa, se necessário -->
                    <!-- <?php // include './include/cEmpresaFiltro.php'; ?> -->
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable table-sm" id="tabelaReserva" width="50%">
                    <thead>
                        <tr>
                            <th class="align-center">#</th>
                            <th class="align-center">Acomodação</th>
                            <th class="align-center">Cliente</th>
                            <th class="align-center">CPF</th>
                            <th class="align-center">Data de Início</th>
                            <th class="align-center">Data de Término</th>
                            <th class="align-center">Situação</th>
                            <?php if ($permissaoPerfil !== "u") { ?>
                                <th class="align-center">Editar</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = mysqli_fetch_array($result)) { $idReserva = $row['idreserva']; ?>
                        <tr class="font-12">
                            <td class="align-center"><?php echo $i++; ?></td>
                            <td class="align-center"><?php echo $row["Acomodacoes"] ?></td>
                            <td class="align-center"><?php echo $row["nome"] ?></td>
                            <td class="align-center"><?php echo $row["cpf"] ?></td>
                            <td class="align-center"><?php echo $row["inicio"] ?></td>
                            <td class="align-center"><?php echo $row["final"] ?></td>
                            <td class="align-center"><?php echo $row["situacao"] ?></td>
                            <?php if ($permissaoPerfil !== "u") { ?>
                                <td class="align-center">
                                    <a href="editar.php?idreserva=<?php echo $idReserva ?>" class="pointer">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>Total de registros: <?php echo $totalregistros; ?></div>
    <hr />
    <a href="./reserva.php">Realizar reserva</a><br />
    <a href="./checkin.php">Realizar check-in</a><br />
    <a href="./checkout.php">Realizar check-out</a><br />
    <a href="../funcionarios/include/painel.php">Pagina Inicial</a>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('#tabelaReserva').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'Cadastrar Reserva',
                        action: function (e, dt, node, config) {
                            window.location.href = './reserva.php';
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>