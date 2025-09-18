<?php
include('../config/conexao.php');
include('../../login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];

$sql = "SELECT * FROM clientes";
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
                        <th class="align-center">Nome</th>
                        <th class="align-center">Situação do perfil</th>
                        <th class="align-center">CPF</th>
                        <th class="align-center">Telefone</th>
                        <th class="align-center">Email</th>
                        <th class="align-center">Estado</th>
                        <th class="align-center">Cidade</th>
                        '.($permissaoPerfil !== "u" ? '<th class="align-center">Editar</th>' : '').'
                    </tr>
                </thead>
                <tbody>';
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    $idMatricula = $row['idcliente'];
    $main_content .= '<tr class="font-12">
        <td class="align-center">'.$i++.'</td>
        <td class="align-center">'.$row["nome"].'</td>
        <td class="align-center">'.($row["situacao"] == 'a' ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-secondary">Inativo</span>').'</td>
        <td class="align-center">'.$row["cpf"].'</td>
        <td class="align-center">'.$row["telefone"].'</td>
        <td class="align-center">'.$row["email"].'</td>
        <td class="align-center">'.$row["estado"].'</td>
        <td class="align-center">'.$row["cidade"].'</td>';
    if ($permissaoPerfil !== "u") {
        $main_content .= '<td class="align-center"><a href="editar.php?idcliente='.$idMatricula.'" class="pointer"><i class="fa fa-edit"></i></a></td>';
    }
    $main_content .= '</tr>';
}
$main_content .= '</tbody>
            </table>
        </div>
        <div>Total de registros: '.$totalregistros.'</div>
        <hr />
        <a href="./cadastrar.php">Cadastrar cliente</a><br />
        <a href="../funcionarios/include/painel.php">Pagina Inicial</a>
    </div>
</div>
<script src="/parnaioca/assets/vendor/jquery/jquery.min.js"></script>
<script src="/parnaioca/assets/vendor/jquery-datatable/jquery.dataTables.min.js"></script>
<script src="/parnaioca/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#datatable").DataTable();
    });
</script>';

include '../../views/layouts/sbadmin-main.php';