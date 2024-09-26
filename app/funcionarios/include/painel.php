<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/login/validar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parnaioca - Painel</title>
    </head>
    <body>
                
        <h3>Painel do Sistema</h3>
        
        <?php
        echo "Seja bem vindo(a) ".$_SESSION["login"];
        ?>
        
        <h4>Menu</h4>
        
        <?php
            if($_SESSION["perfil"] == "a"){
                include($_SERVER['DOCUMENT_ROOT'].'/app/funcionarios/menu_adm.php');
            }elseif($_SESSION["perfil"] == "u"){
                include($_SERVER['DOCUMENT_ROOT'].'/app/funcionarios/menu_user.php');
            }
        ?>
        
        
    </body>
</html>
