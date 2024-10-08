<?php
define('ROOT_PATH', dirname(__FILE__));
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Parnaioca - login</title>

</head>

<body>

    <h4>Bem vindo a Parnaioca</h4>

    <form action="/login/verificarlogin.php" method="post" id="f">

        Login:<br />
        <input type="text" name="login" /><br />

        Senha:<br />
        <input type="password" name="senha" /><br />



        <input type="submit" value="Login" />

    </form>

    <?php
    if (!empty($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo $msg;
    }
    ?>
</body>

</html>