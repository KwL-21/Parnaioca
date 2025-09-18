<?php
define('ROOT_PATH', dirname(__FILE__));


$login_content = '<form action="./login/verificarlogin.php" method="post" id="f">
    <div class="form-floating mb-3">
        <input class="form-control" id="inputLogin" type="text" name="login" placeholder=" " required />
        <label for="inputLogin">Login</label>
    </div>

    <div class="form-floating mb-3">
        <input class="form-control" id="inputPassword" type="password" name="senha" placeholder=" " required />
        <label for="inputPassword">Senha</label>
    </div>

    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </div>
</form>';


if (!empty($_GET["msg"])) {
    $login_content .= '<div class="alert alert-warning mt-3">' . htmlspecialchars($_GET["msg"]) . '</div>';
}

include __DIR__ . '/views/layouts/sbadmin-login.php';
