<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Página - <?= basename(dirname($_SERVER['SCRIPT_NAME'])) ?></title>
    <!-- Bootstrap CSS -->
    <link href="/parnaioca/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- SB Admin CSS -->
    <link href="/parnaioca/assets/startbootstrap-sb-admin-gh-pages/css/styles.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="/">Parnaioca</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/parnaioca/login/sair.php">Sair</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="../../app/dashboard/dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="../../app/clientes/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                        </a>
                        <a class="nav-link" href="../../app/funcionarios/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Funcionários
                        </a>
                        <a class="nav-link" href="../../app/produtos/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Produtos
                        </a>
                        <a class="nav-link" href="../../app/reserva/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Reservas
                        </a>
                        <!-- Adicione mais itens conforme necessário -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    <!-- Conteúdo principal da página -->
                    <?php if (isset($main_content)) {
                        echo $main_content;
                    } ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Parnaioca 2025</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="/parnaioca/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- SB Admin JS -->
    <script src="/parnaioca/assets/startbootstrap-sb-admin-gh-pages/js/scripts.js"></script>
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(function(dropdown) {
            dropdown.addEventListener('click', function(e) {
                e.preventDefault();
                var menu = this.nextElementSibling;
                menu.classList.toggle('show');
            });
        });
    </script>
</body>

</html>