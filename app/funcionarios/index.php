<?php
include_once('../config/conexao.php');
include('../../login/validar.php');

$permissaoPerfil = $_SESSION["perfil"];
$sql = "SELECT * FROM funcionarios";
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
                        <th class="align-center">Login</th>
                        <th class="align-center">Perfil</th>
                        '.($permissaoPerfil !== "u" ? '<th class="align-center">Editar</th><th class="align-center">Excluir</th>' : '').'
                    </tr>
                </thead>
                <tbody>';
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    $idFuncionario = $row['matricula'];
    $main_content .= '<tr class="font-12">
        <td class="align-center">'.$i++.'</td>
        <td class="align-center">'.$row["login"].'</td>
        <td class="align-center">'.($row['perfil'] == 'u' ? 'Usuário' : 'Administrador').'</td>';
    if ($permissaoPerfil !== "u") {
        $main_content .= '<td class="align-center"><a href="editar.php?idusuario='.$idFuncionario.'" class="pointer"><i class="fa fa-edit"></i></a></td>';
        $main_content .= '<td class="align-center"><a href="#" onclick="excluir('.$idFuncionario.')" class="pointer"><i class="fa fa-trash text-dark"></i></a></td>';
    }
    $main_content .= '</tr>';
}
$main_content .= '</tbody>
            </table>
        </div>
        <div>Total de registros: '.$totalregistros.'</div>
        <hr />
        <a href="./cadastrar.php">Cadastrar funcionário</a> <br />
        <a href="./include/painel.php">Pagina Inicial</a>
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