

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
<?php
    $main_content = '<div class="card">
        <div class="body">
            <div class="row justify-content-end mr-2 pb-2">
                <a onclick="abrirHistorico()"><small><i class="fa fa-history"></i> Histórico</small></a>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Filtro de empresa, se necessário -->
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable table-sm" id="tabelaReserva" width="100%">
                    <thead>
                        <tr>
                            <th class="align-center">#</th>
                            <th class="align-center">Acomodação</th>
                            <th class="align-center">Cliente</th>
                            <th class="align-center">CPF</th>
                            <th class="align-center">Data de Início</th>
                            <th class="align-center">Data de Término</th>
                            <th class="align-center">Situação</th>
                            '.($permissaoPerfil !== "u" ? '<th class="align-center">Editar</th>' : '').'
                        </tr>
                    </thead>
                    <tbody>';
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    $idReserva = $row['idreserva'];
    $main_content .= '<tr class="font-12">
        <td class="align-center">'.$i++.'</td>
        <td class="align-center">'.$row["Acomodacoes"].'</td>
        <td class="align-center">'.$row["nome"].'</td>
        <td class="align-center">'.$row["cpf"].'</td>
        <td class="align-center">'.$row["inicio"].'</td>
        <td class="align-center">'.$row["final"].'</td>
        <td class="align-center">'.$row["situacao"].'</td>';
    if ($permissaoPerfil !== "u") {
        $main_content .= '<td class="align-center"><a href="editar.php?idreserva='.$idReserva.'" class="pointer"><i class="fa fa-edit"></i></a></td>';
    }
    $main_content .= '</tr>';
}
$main_content .= '</tbody>
                </table>
            </div>
        </div>
    </div>
    <div>Total de registros: '.$totalregistros.'</div>
    <hr />
    <a href="./reserva.php">Realizar reserva</a><br />
    <a href="./checkin.php">Realizar check-in</a><br />
    <a href="./checkout.php">Realizar check-out</a><br />
    <a href="../funcionarios/include/painel.php">Pagina Inicial</a>';

include '../../views/layouts/sbadmin-main.php';
?>
<script src="/parnaioca/assets/vendor/jquery/jquery.min.js"></script>
<script src="/parnaioca/assets/vendor/jquery-datatable/jquery.dataTables.min.js"></script>
<script src="/parnaioca/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#tabelaReserva')) {
            $('#tabelaReserva').DataTable().destroy();
        }
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
