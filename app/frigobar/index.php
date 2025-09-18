<?php
include('../../login/validar.php');

$main_content = '<h2>Bem vinda a Area frigobar</h2>
    <a href="./consulteI.php">Itens no frigobar</a><br />
    <a href="./consulteF.php">Frigobar por acomodação</a><br />
    <a href="../funcionarios/include/painel.php">Pagina Inicial</a>';

include '../../views/layouts/sbadmin-main.php';