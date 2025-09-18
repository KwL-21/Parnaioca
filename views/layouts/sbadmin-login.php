<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Parnaioca</title>
    <!-- SB Admin CSS -->
    <link href="/parnaioca/assets/startbootstrap-sb-admin-gh-pages/css/styles.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="/parnaioca/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <!-- Conteúdo da página de login -->
                                    <?php if (isset($login_content)) { echo $login_content; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="/parnaioca/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SB Admin JS -->
    <script src="/parnaioca/assets/startbootstrap-sb-admin-gh-pages/js/scripts.js"></script>
</body>
</html>
