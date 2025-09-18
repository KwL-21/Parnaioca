<?php
include('../config/conexao.php');
include('../../login/validar.php');

$sql = "SELECT * FROM produtos";
$result = mysqli_query($con, $sql);
$totalregistros = mysqli_num_rows($result);

$main_content = '<h3>Consulta de Registro</h3>
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
                <tbody>';
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    $main_content .= '<tr class="font-12">
        <td class="align-center">'.$i++.'</td>
        <td class="align-center">'.$row["nome"].'</td>
        <td class="align-center">'.$row["estoque"].'</td>
        <td class="align-center">R$'.$row["valorunitario"].'</td>
    </tr>';
}
$main_content .= '</tbody>
            </table>
        </div>
        <div>Total de registros: '.$totalregistros.'</div>
        <hr />
        <a href="./cadastrar.php">Cadastrar produto</a> <br />
        <a href="../funcionarios/include/painel.php">Pagina Inicial</a>
    </div>
</div>';

include '../../views/layouts/sbadmin-main.php';
?>
<script src="/parnaioca/assets/vendor/jquery/jquery.min.js"></script>
<script src="/parnaioca/assets/vendor/jquery-datatable/jquery.dataTables.min.js"></script>
<script src="/parnaioca/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#datatable").DataTable({
            responsive: true,
            language: {
                url: '../../assets/vendor/jquery-datatable/Portuguese-Brasil.json'
            }
        });
    });
</script>